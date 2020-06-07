@extends('layout.success')
@section('title', "Success-CheckOut")

@section('content')
<div class="container">
    <div class="row">
        <div class="card text-center col-md-12">
            <div class="card-header">
                Payment
            </div>
            <div class="card-block">
                <h4 class="card-title pt-3">Payment Submmitted <b>Error</b></h4>
                <p class="card-text">Your payment has been processed Failed and you booking is confirmed.</p>
                <a href="#" class="btn btn-primary">Please Try again</a>
            </div>
            <div class="col-md-12">
                <img src="{{url('creativestudio/img/banner/error.svg')}}" alt="Image">

                <div class="card col-md-12">
                    <a href="{{url('/')}}"> <button type="button" class="btn button primary-button">Home</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
