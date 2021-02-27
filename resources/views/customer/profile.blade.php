@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800">Profile</h1>
    @if (session('msg'))
                    <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
                @endif
          <div class="card shadow mt-4 mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Your Profile</h6>

            </div>

            <div class="card-body">
                
              
            <form action="{{ url('customer/profile') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for=""> Name </label>
                    <input type="text" name="name" disabled value="{{ $user->name }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> ClientId </label>
                    <input type="text" name="name" disabled value="{{ $user->client_id }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> Username </label>
                    <input type="text" name="username" disabled value="{{ $user->username }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> Nationality </label>
                    <input type="text" name="naNationalityme" disabled value="{{ $user->Nationality }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> Address </label>
                    <input type="text" name="address" disabled value="{{ $user->Address }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> Postal Code </label>
                    <input type="text" name="postalcode" disabled value="{{ $user->postalcode }}" required class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for=""> Email </label>
                    <input type="email" name="email" disabled value="{{ $user->email }}" required class="form-control" id="">
                </div>

                <div class="form-group">
                    <label for=""> Gender </label>
                   <select name="gender" disabled class="form-control">
                       @if ($user->gender == "male")
                       <option value="male" selected>Male</option>
                       <option value="female" >Female</option>
                       @else
                       <option value="male">Male</option>
                       <option value="female" selected>Female</option>
                       @endif
                   </select>
                </div>

                <div class="form-group">
                    <label for=""> Phone number </label>
                    <input type="text" name="phonenumber" disabled value="{{ $user->phonenumber }}" required class="form-control" id="">
                </div>

                <div class="mb-2">
                <span class="pull-right">Want to Change Password? <a href="{{ url('customer/change-password') }}" >Click Here</a></span>
                </div>

                <div>
                    {{-- <button type="submit" class="btn btn-info btn-block">Submit</button> --}}
                </div>
            
            </form>


            </div>
          </div>
</div>


          
          @endsection

      
