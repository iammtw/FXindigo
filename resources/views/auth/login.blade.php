<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png"  href="{{ url('icon.jpg') }}">
        <title> FXindigo </title>
        <meta name="description" content="FXindigo" />
        <meta name="author" content="FXIndigo" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700"rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    </head>

    <body class="bg-white">
        <div class="app">
            <div class="app-wrap">
                <div class="loader">
                    <div class="h-100 d-flex justify-content-center">
                        <div class="align-self-center">
                            <img
                                src="assets/img/loader/loader.svg"
                                alt="loader"
                            />
                        </div>
                    </div>
                </div>
                <div class="app-contant">
                    <div class="bg-white">
                        <div class="container-fluid p-0">
                            <div class="row no-gutters">
                                <div
                                    class="col-sm-6 col-lg-5 col-xxl-3 align-self-center order-2 order-sm-1"
                                >
                                    <div
                                        class="d-flex align-items-center h-100-vh"
                                    >
                                        <div class="login p-50 mx-auto">
                                                <img src="{{url('logo.png')}}"  style="height: 100px;" alt="" >
                                           
                                            <p>
                                                Welcome back, please login to
                                                your account.
                                            </p>
                                            <form method="POST" action="{{ route('login') }}" class="mt-3 mt-sm-5" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label"
                                                                >Email
                                                                Address*</label
                                                            >
                                                            <input
                                                                id="email"
                                                                type="email"
                                                                class="form-control @error('email') is-invalid @enderror"
                                                                name="email"
                                                                value="{{ old('email') }}"
                                                                required
                                                                autocomplete="email"
                                                                autofocus
                                                            />

                                                            @error('email')
                                                            <span
                                                                class="invalid-feedback"
                                                                role="alert"
                                                            >
                                                                <strong
                                                                    >{{ $message
                                                                    }}</strong
                                                                >
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label
                                                                class="control-label"
                                                                >Password*</label
                                                            >
                                                            <input
                                                                id="password"
                                                                type="password"
                                                                class="form-control @error('password') is-invalid @enderror"
                                                                name="password"
                                                                required
                                                                autocomplete="current-password"
                                                            />

                                                            @error('password')
                                                            <span
                                                                class="invalid-feedback"
                                                                role="alert"
                                                            >
                                                                <strong
                                                                    >{{ $message
                                                                    }}</strong
                                                                >
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button
                                                            type="submit"
                                                            class="btn btn-primary text-uppercase"
                                                            style="background: #142748"
                                                        >
                                                            Sign In
                                                        </button>
                                                        @if (Route::has('password.request'))
                                                        <a class="btn btn-link" style="background: #142748;color:white;" href="{{ route('password.request') }}">
                                                            {{ __('Forgot Your Password?') }}
                                                        </a>
                                                    @endif
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <p>
                                                            Don't have an
                                                            account ?<a
                                                                href="{{url('register')}}"
                                                            >
                                                                Sign Up</a
                                                            >
                                                        </p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2"
                                >
                                    <div class="row align-items-center h-100">
                                        <div class="col-7 mx-auto">
                                            <img
                                                class="img-fluid"
                                                src="assets/img/login.svg"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="assets/js/vendors.js"></script>
        <script src="assets/js/app.js"></script>
    </body>
</html>
