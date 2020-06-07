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
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Login box.scss -->
    <!-- ============================================================== -->
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
                    <h2 class="mt-3 text-center">Sign Up</h2>
                    <p class="text-center">customer for free
                    </p>
                    </ul>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="text-dark">{{ __('Name') }}</label>

                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" placeholder="enter your name" required
                                    autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username" class="text-dark">{{ __('Username') }}</label>

                                <input id="username" type="text"
                                    class="form-control @error('username') is-invalid @enderror" name="username"
                                    value="{{ old('username') }}" placeholder="enter your username" required
                                    autocomplete="username" autofocus>

                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    </div>


                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="email" class="text-dark">{{ __('E-Mail Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                placeholder="enter your Email" autofocus>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password" class="text-dark">{{ __('Password') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="enter your Password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="password-confirm" class="text-dark">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="enter your password">
                        </div>
                    </div>

                    <div class="col-lg-12 text-center">
                        <button type="submit" class="btn btn-block btn-dark">
                            {{ __('Register') }}
                        </button>
                    </div>

                    <div class="col-lg-12 text-center mt-5">
                        Already have an account? <a href="{{ route('login')}}" class="text-danger">Sign In</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="form-group row">
            <label for="name" class="text-dark">{{ __('Name') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="text-dark">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="text-dark">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="text-dark">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div> --}}
