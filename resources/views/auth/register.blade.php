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
                            <div class="d-flex align-items-center " style="height: 100%">
                              <div class="register p-5">
                                <img
                                src="{{url('logo.png')}}"
                                style="height: 100px"
                                alt=""
                              />
                                <p>Welcome, Please create your account.</p>
                                <?php
                
                if(isset($_GET['refferal'])){
                    $code =  $_GET['refferal']; 
                } else {
                    $code = "FXINDIGO";
                }
                ?>
                                <form method="POST" action="{{ route('register') }}" class="mt-3 mt-sm-5" >
                                    @csrf
                                  <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label">First Name*</label>
                                            <input id="name" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="name" class="control-label">Last Name*</label>
                                            <input id="name" type="text" class="form-control @error('secondname') is-invalid @enderror" name="secondname" value="{{ old('secondname') }}" required autocomplete="name" autofocus>
            
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">UserName*</label>
                                            <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}"  required>
                                            @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                         @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group ">
                                            <label for="password-confirm" class="control-label"> Gender* </label>
                                            <select name="gender" class="form-control">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group ">
                                            <label for="email" class="control-label">EMail Address*</label>
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-8">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">Nationality*</label>
                                            <input type="text" class="form-control" name="nationality" required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-4">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">Zip Code*</label>
                                            <input type="text" class="form-control" name="postalcode" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">Phone number*</label>
                                            <input type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" required>

                                            @error('phonenumber')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">Address*</label>
                                            <input type="text" class="form-control" name="address" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password" class="control-label">Password*</label>
                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="password-confirm" class="control-label">Confirm Password*</label>
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="phonenumber" class="control-label">Referral Code*</label>
                                            <input type="text" class="form-control" value= "{{ $code }}" name="referred" required>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                      <button type="submit" class="btn btn-primary text-uppercase" style="background: #142748">
                                        Sign up
                                     </button >
                                    </div>

                                    <div class="col-12 mt-3">
                                      <p>
                                        Already have an account ?<a
                                          href="{{url('/login')}}"
                                        >
                                          Sign In</a
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
                                  alt=""
                                  style="margin-bottom: 250px;"
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
