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
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/vendors.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ url('assets/css/style.css') }}" />
    </head>

    <body class="bg-white">
        <div class="app">
            <div class="app-wrap">
                <div class="loader">
                    <div class="h-100 d-flex justify-content-center">
                        <div class="align-self-center">
                            <img
                                src="{{ url('assets/img/loader/loader.svg') }}"
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
                                                Please Enter your email Address.
                                            </p>
                                            @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <br>
                                           
                                            <form method="POST" action="{{ route('password.email') }} class="mt-3 mt-sm-5" >
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>
                                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <button type="submit" class="btn btn-primary">
                                                            {{ __('Send Password Reset Link') }}
                                                        </button>
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
                                                src="{{ url('assets/img/login.svg') }}"
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
        <script src="{{ url('assets/js/vendors.js') }}"></script>
        <script src="{{ url('assets/js/app.js') }}"></script>
    </body>
</html>
