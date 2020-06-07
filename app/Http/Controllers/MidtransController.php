<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Transaction;
use illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    //
    public function notificationHandler(Request $request)
    {

        //configurasi pembayaran melalui Midtrans
        config::$serverKey     = config('midtrans.serverKey');
        config::$isProduction  = config('midtrans.isProduction');
        config::$isSanitized   = config('midtrans.isSanitized');
        config::$is3ds         = config('midtrans.is3ds');

        $notification = new Notification();

        //pecah order id nya agar bisa diterima oleh db
        $order = explode('-', $notification->order_id);

        //assign ke variable untuk memudahkan coding
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = [1];



        //cari transaksi berdasrkan id
        $transaction = Transaction::findorFail($order_id);

        //handle notifikasi status payment midtrans
        if ($status == 'capture')
        {
            if ($type == 'credit_card')
            {
                if ($fraud == 'challenge')
                {
                    // TODO Set payment status in merchant's database to 'challenge'
                    $transaction->transaction_status = "CHALLENGE";
                    // TODO Set payment status in merchant's database to 'success'
                } else {
                    $transaction->transaction_status = "SUCCESS";
                }
            }
        } else if ($status == 'settlement') {
            $transaction->transaction_status = "SUCCESS";
        } else if ($status == 'pending') {
            $transaction->transaction_status = "PENDING";
        } else if ($status == 'deny') {
            // TODO Set payment status in merchant's database to 'failure'
            $transaction->transaction_status = "FAILED";
        } else if ($status == 'expire') {
            // TODO Set payment status in merchant's database to 'EXPIRED'
            $transaction->transaction_status = "EXPIRED";
        } else if ($status == 'cancel') {
            // TODO Set payment status in merchant's database to 'Cancel'
            $transaction->transaction_status = "FAILED";
        }

        //save transaksi
        $transaction->save();

        //kirimkan email
        if ($transaction)
        {
            if ($status == 'capture' && $fraud == 'accept')
            {
                Mail::to($transaction->user)->send(new TransactionSuccess($transaction));
            } else if ($status == 'settlement')
            {
                Mail::to($transaction->user)->send(new TransactionSuccess($transaction));
            } else if ($status == 'success')
            {
                Mail::to($transaction->user)->send(new TransactionSuccess($transaction));
            } else if ($status == 'capture' && $fraud == 'challenge')
            {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Not settlement'
                    ]
                ]);
            }
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Notification Success'
                ]
            ]);
        }
    }

    public function finishRedirct(Request $request)
    {
        return view('pages.success');
    }

    public function unfinishRedirct(Request $request)
    {
        return view('pages.unfinish');
    }

    public function errorRedirct(Request $request)
    {
        return view('pages.failed');
    }
}
