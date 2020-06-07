@extends('layout.app')

@section('title', "Details")


@section('content')
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Detail</li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-md-8">
            <div class="card bg-info md-8 ">
                <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <h2 class="text-white" style=" font-size: 18px;">last post </h2>
                    @if ($item->galleries->count())
                    <div class="row img-hover-zoom">
                        <div class="col">
                            <img src="{{url('creativestudio/img/services/bg1.png')}}"
                                alt="Another Image zoom-on-hover effect">
                        </div>
                        <div class="col-md-auto">
                            <img src="{{url('creativestudio/img/services/bg2.png')}}"
                                alt="Another Image zoom-on-hover effect">
                        </div>
                    </div>
                    @foreach ($item->galleries as $gallery)
                    <br />
                    <div class="row img-hover-zoom">
                        <div class="col">
                            <img src="{{url('creativestudio/img/services/bg4.png')}}"
                                alt="Another Image zoom-on-hover effect">
                        </div>
                        <div class="col-md-auto">
                            <img src="{{url('creativestudio/img/services/bg3.png')}}"
                                alt="Another Image zoom-on-hover effect">
                        </div>

                    </div>
                    @endforeach
                    @endif

                </div>
                <hr />
                <p class="card-text">{{$item->slug}}</p>
                </br>
                {{$item->about}}
            </div>
        </div>

        <div class="col-md-4">
            <div class="card bg-info md-4 text-white">
                <div class="card-body">
                    <h5 class="card-title">Member are going</h5>
                    <hr />
                    <h2 class="text-white" style=" font-size: 18px;">Trip Informations </h2>
                    <table class="trip-informations">
                        <tr>
                            <th width="50%">Date of Departure</th>
                            <td width="50%" class="text-right">
                                {{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y')}}</td>

                        </tr>
                        <tr>
                            <th width="50%">Duration</th>
                            <td width="50%" class="text-right">{{$item->duration}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Type</th>
                            <td width="50%" class="text-right">{{$item->type}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Price</th>
                            <td width="50%" class="text-right">${{$item->price}} / person</td>
                        </tr>
                    </table>
                    @auth
                    <form action="{{ route('checkout_process', $item->id)}}" method="POST">
                        @csrf
                        <button type="submit" class="btn button primary-button mt-3 py-2">
                            Join
                            Now
                        </button>
                    </form>
                    @endauth

                    @guest
                    <a href="{{ route('login')}}"><button type="button"
                            class="btn button btn-block primary-button mt-3 py-auto">Join
                            or Register</button></a>
                </div>
                @endguest
            </div>
        </div>
    </div>
</div>
<br />
@endsection

@push('addon-script')
<script src="{{url('creativestudio/js/smooth-scroll.js')}}"></script>
<script>
    var scroll = new SmoothScroll('a[href*="#"]');
</script>
@endpush
