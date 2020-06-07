@extends('layouts.app')

@section('content')
<div class="main-wrapper">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div class="auth-wrapper d-flex no-block justify-content-center
    align-items-center position-relative"
        style="background:url({{ url('adm_dashboard/assets/images/big/auth-bg.jpg')}}) no-repeat center center;">
        <div class="auth-box row">
            <div class="col-lg-7 col-md-5 modal-bg-img"
                style="background-image: url({{ url('adm_dashboard/assets/images/big/Banner@2x.png')}});">
            </div>

            <div class="col-lg-5 col-md-7 bg-white">
                <div class="p-3">
                    <div class="text-center">
                        <img src="{{ url('adm_dashboard/assets/images/big/logocv.png')}}" alt="wrapkit">
                    </div>
                    <h2 class="mt-3 text-center">Sign In</h2>
                    <p class="text-center">Enter your email address and password to access Admin
                        Dashboard.
                    </p>
                    </ul>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="text-dark">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
                                    placeholder="enter your username" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password" class="text-dark">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="enter your password" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-12 offset-lg-auto">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-success">
                            {{ __('Login') }}
                        </button>
                    </div>

                    @if (Route::has('register'))
                    <div class="col-lg-12 text-center mt-2">
                        Don't have an account? <a href="{{ route('register') }}" class="text-danger">Sign
                            Up</a>
                    </div>
                    @endif

                    @if (Route::has('password.request'))
                    <div class="col-lg-12 text-center mt-auto">
                        Don't <a href="{{ route('password.request') }}" class="text-warning">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                    @endif
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

{{-- <div class="form-group row">
        <label for="email"
            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

<div class="col-md-6">
    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
        value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>

            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label>
        </div>
    </div>
</div>

<div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
        <button type="submit" class="btn btn-primary">
            {{ __('Login') }}
        </button>

        @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
        @endif
    </div>
</div> --}}
