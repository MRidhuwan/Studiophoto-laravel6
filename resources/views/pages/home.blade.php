@extends('layout.app')

@section('title', "CREATIVESTUDIO")


@section('content')
<main class="site-main">
    <!--  ======================= Start Banner Area =======================  -->
    <section class="site-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 site-title">
                    <h3 class="title-text">Hello</h3>
                    <h1 class="title-text text-uppercase">CREATIVE STUDIO</h1>
                    @guest
                    <form action="" method="post">
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap">
                                <button type="submit" class="btn button primary-button mr-4 text-uppercase"
                                    onclick="event.preventDefault(); location.href='{{ route('register')}}'">Booking</button>
                                <button type="button" class="btn button secondary-button text-uppercase"
                                    onclick="event.preventDefault(); location.href='{{ url('login')}}'">Login</button>
                            </div>
                        </div>
                    </form>
                    @endguest

                    @auth
                    <form action="{{ url('logout')}}" method="POST">
                        @csrf
                        <div class="site-buttons">
                            <div class="d-flex flex-row flex-wrap">
                                {{-- <button type="submit" class="btn button primary-button mr-4 text-uppercase"
                                    onclick="event.preventDefault(); href='{{ url('detail')}}'">Booking</button> --}}

                                <button type="submit" class="btn button secondary-button text-uppercase">LogOut</button>
                            </div>
                        </div>
                    </form>
                    @endauth
                </div>
                <div class="col-lg-6 col-md-12 banner-image">
                    <img src="{{url('creativestudio/img/banner/cs.svg')}}" alt="banner-img" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <!--  ======================= End Banner Area =======================  -->
    <section id="services">
        <div class="container text-center">
            <h1 class="title-text">WHY WE DO</h1>
            <div class="row text-center">
                @foreach ($items as $item)
                <div class="col-md-4 services">
                    <a href="{{ route('detail', $item->slug)}}">
                        <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}"
                            class="service-img">

                        <h4>{{$item->title}} </h4>
                    </a>
                    <p>{{$item->about}}</p>
                </div>
                @endforeach
                {{-- <div class="col-md-4 services">
                    <img src="#" class="service-img">
                    <h4>Hunting</h4>
                    <p>Subscribe Easy tutorials YouTube Channel to watch more videos on wesite development, Digital
                        Marketing, WordPress and graphics Designing.</p>
                </div>
                <div class="col-md-4 services">
                    <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}"
                class="service-img">
                <h4>Photo Booth</h4>
                <p>Subscribe Easy tutorials YouTube Channel to watch more videos on wesite development, Digital
                    Marketing, WordPress and graphics Designing.</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}"
                    class="service-img">
                <h4>My Family</h4>
                <p>Subscribe Easy tutorials YouTube Channel to watch more videos on wesite development, Digital
                    Marketing, WordPress and graphics Designing.</p>
            </div>
            <div class="col-md-4 services">
                <img src="{{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}"
                    class="service-img">
                <h4>personal</h4>
                <p>Subscribe Easy tutorials YouTube Channel to watch more videos on wesite development, Digital
                    Marketing, WordPress and graphics Designing.</p>
            </div>
            <div class="col-md-4 services">
                <img src="
                    {{$item->galleries->count() ? Storage::url($item->galleries->first()->image) : ''}}"
                    class="service-img">
                <h4>Have Fun</h4>
                <p>Subscribe Easy tutorials YouTube Channel to watch more videos on wesite development, Digital
                    Marketing, WordPress and graphics Designing.</p>
            </div> --}}
        </div>
        <button type="button" class="btn button primary-button">All Services</button>
        </div>
    </section>
    <!--  ========================= About Area ==========================  -->
    <section class="brand-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="about-image">
                        <img src="{{url('creativestudio/img/services/bg4.svg')}}" alt="About us" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 about-title">
                    <h2 class="text-uppercase pt-5">
                        <a class="navbar-brand" href="#"><img src="{{url('creativestudio/img/logocv.png')}}"
                                alt="logo"></a>
                    </h2>
                    <div class="paragraph py-4 w-75">
                        <p class="para">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error rerum iure obcaecati vel
                            possimus officia maiores perferendis ut! Quos, perspiciatis.
                        </p>
                        <p class="para">
                            It is a long established fact that a reader will be distracted by the readable content
                            of a page when looking at its layout. The point of using Lorem Ipsum is that it has a
                            more-or-less normal distribution of letters, as opposed to using 'Content here, content
                            here
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  ========================= End About Area ==========================  -->
    <section class="about-area">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <div class="about-title">
                        <h1 class="text-uppercase title-h1">about me my partner</h1>
                        <p class="para">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellendus, deleniti
                            recusandae. Esse incidunt rem repellendus ab voluptates maxime? Nemo, numquam!
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container carousel py-lg-5">
            <div class="owl-carousel owl-theme">
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="{{url('creativestudio/img/testimonials/mm1.png')}}" alt="img1" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Muhamad Ridwan </h4>
                        <p class="para">Ceo Creative Studio</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="{{url('creativestudio/img/testimonials/mm2.png')}}" alt="img2" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Yahya ayash</h4>
                        <p class="para">interior desain photo.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="{{url('creativestudio/img/testimonials/mm3.png')}}" alt="img1" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Rizal Rivaldi</h4>
                        <p class="para">Desain Web & Property interior.</p>
                    </div>
                </div>
                <div class="client row">
                    <div class="col-lg-4 col-md-12 client-img">
                        <img src="{{url('creativestudio/img/testimonials/t2.jpg')}}" alt="img2" class="img-fluid">
                    </div>
                    <div class="col-lg-8 col-md-12 about-client">
                        <h4 class="text-uppercase">Mac Hill</h4>
                        <p class="para">Support Aplication & Salesman.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection
