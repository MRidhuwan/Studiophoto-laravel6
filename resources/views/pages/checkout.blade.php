@extends('layout.checkout')

@section('title', "CheckOut")

@section('content')
<div class="container">
    <nav aria-label="breadcrumb pull-right">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item">Detail</li>
            <li class="breadcrumb-item active" aria-current="page">Checkout</li>

        </ol>
    </nav>
    <div class=" row">
        <div class="col-sm-8">
            <div class="card bg-info sm-8">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible bg-warning text-white border-0 fade show"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <strong>Error - {{ $error }}</strong>

                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h5 class="card-title">List Checkout</h5>
                    <h2 class="text-white" style=" font-size: 18px;"> </h2>
                    <div class="attendee">
                        <table class="table table-responsive-md text-white">
                            <thead>
                                <tr>
                                    <td scope="col">Picture</td>
                                    <td scope="col">Name</td>
                                    <td scope="col">Nationality</td>
                                    <td scope="col">Visa</td>
                                    <td scope="col">Passport</td>
                                    <td scope="col"></td>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->details as $detail)
                                <tr>
                                    <td>
                                        <img src="https://ui-avatars.com/api/?name={{ $detail->username}}" alt=""
                                            height="60" class="rounded-circle" />
                                    </td>

                                    <td class="align-middle"> {{ $detail->username}}</td>
                                    <td class="align-middle">{{ $detail->nationality}}</td>
                                    <td class="align-middle">{{ $detail->is_visa ? '30 Days' : 'N/A' }}</td>
                                    <td class="align-middle">{{ \Carbon\Carbon::createFromDate($detail->doe_passport)
                                    > \Carbon\Carbon::now() ? 'Active' : 'InActive' }}</td>
                                    <td class="align-middle">
                                        <a href="{{ route('checkout-remove', $detail->id    )}}">
                                            <img src="{{url('creativestudio/icons/Group.png')}}" alt="" />
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="12" class="text-center">
                                        <button type=" button" class="btn btn-lg btn-danger" data-toggle="popover"
                                            title="" data-content="Belum ada Data ?" data-original-title="Warning">Data
                                            Empty</button></td>
                                </tr>
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                    <div class="member mt-3">
                        <h2 class="text-white" style="font-size: 20px;">Add Member</h2>

                        <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id)}}">

                            @csrf

                            <label for="username" class="sr-only ">Username</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username"
                                placeholder="Username" required style="width:150px;">

                            <label for="nationality" class="sr-only ">nationality</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="nationality" id="nationality"
                                placeholder="Nationality" required style="width:10em;">



                            <label for="is_visa" class="sr-only ">VISA</label>
                            <select name="is_visa" class="form-control mb-2 mr-sm-2" id="is_visa" required>
                                <option value="" selected>VISA
                                </option>
                                <option value="1">30 Days</option>
                                <option value="0">N/A</option>
                            </select>

                            <label for="doe_passport" class="sr-only ">passport</label>
                            <input type="date" class="form-control mb-2 mr-sm-2" name="doe_passport" id="doe_passport"
                                placeholder="passport" required style="width:200px;">

                            <button type="submit" class=" btn button primary-button mb-2 px-2" style="width:50em">
                                Add Now
                            </button>

                        </form>

                        <h3 class="mt-2 mb-0" style="font-size: 15px;">Note</h3>
                        <p class="disclaimer mb-0 " style="font-size: 15px;">
                            You are only able to invite member that has registered in
                            Creativestudio.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 lg-4">
            <div class="card bg-info md-4 card-right">
                <div class="card-body">

                    <h2 class="text-white" style=" font-size: 18px;"> </h2>Checkout Information</h2>
                    <hr />
                    <table class="trip-informations">
                        <tr>
                            <th width="50%">Members</th>
                            <td width="50%" class="text-right">{{$item->details->count()}} person</td>
                        </tr>
                        <tr>
                            <th width="50%">Additional Visa</th>
                            <td width="50%" class="text-right">$ {{$item->additional_visa}},00</td>
                        </tr>
                        <tr>
                            <th width="50%">Trip Price</th>
                            <td width="50%" class="text-right">$ {{$item->travel_package->price}},00 /
                                person</td>
                        </tr>
                        <tr>
                            <th width="50%">Sub Total</th>
                            <td width="50%" class="text-right">$ {{$item->transaction_total}},00</td>
                        </tr>
                        <tr>
                            <th width="50%">Total (+Unique)</th>
                            <td width="50%" class="text-right text-total">
                                <span class="text-blue">$ {{$item->transaction_total}},</span>
                                <span class="text-orange">{{mt_rand(0,99)}}</span>
                            </td>
                        </tr>
                    </table>

                    <hr />
                    <h2 class="text-white" style=" font-size: 18px;"></h2>Payment Instructions</h2>
                    <p class="text-white" style=" font-size: 18px;">
                        Please complete your payment before to continue the wonderful
                        trip
                    </p>
                    <div class="bank">
                        <div class="bank-item pb-3">
                            <img src="{{ url('creativestudio/icons/gopay.png')}}" alt="" width="100%" heigth="100%"
                                class="bank-image" />
                            <div class="description">
                                <h3 class="text-white" style=" font-size: 18px;"></h3>
                                <p>
                                    0881 8829 8800
                                    <br />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="join-container">
                    <a href="{{ route('checkout-success', $item->id)}}" class="btn button primary-button ">
                        I Process Payment
                    </a>
                </div>

                <div class="text-center mt-3">
                    <a href="{{ route('detail', $item->travel_package->slug)}}" class="text-warning">Cancel
                        Booking</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
