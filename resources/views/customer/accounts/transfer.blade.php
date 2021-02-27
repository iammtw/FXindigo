@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
<h2>Client</h2>

<button type="button" class="float-right btn btn-primary">
Wallet Balance <span class="badge badge-light">${{ App\balance::where('user_id',auth::id())->first()->amount }} </span>
</button>
 
 </b> </span> <br><br>
 
 <h2>Select trading account</h2>
  
@foreach ($accounts as $account)
    

<div class="row">
  <div class="col-xl-12 col-md-12 mb-6">
    <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
          <a href="{{ url('customer/select-account/'.$account->id) }}"  class="text-lg"> {{$account->name}} </a>
            </div>
         <center>
          <alert class="alert-info" style="font-weight: bold"> Account ID:   {{ $account->account_id }} </alert> <br>
          <alert class="alert-warning" style="font-weight: bold"> Leverage:   1:{{ $account->leverage }} </alert> <br>
           <alert class="alert-danger" style="font-weight: bold"> Type:   {{ $account->type }} </alert>
         </center>
  

          </div>
          <div class="col-auto">
            <i class="fas fa-cash-register fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<br>

@endforeach
 <h2>Create New</h2>

<div class="row">

<div class="col-xl-12 col-md-12 mb-12">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div
            class="text-center mt-4 display-5 font-weight-bold text-primary text-uppercase mb-1"
          >
            Create Trading Account
          </div>
          <div
            class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
          >
        <a href="{{ url('customer/account') }}" class="btn btn-primary btn-block">Create</a>
          
          </div>
        </div>
        <div class="col-auto">
        </div>
      </div>
    </div>
  </div>
</div> 
</div>
<br><br>
<h2>Partner Accounts</h2>
<div class="row">
<div class="col-xl-12 col-md-12 mb-12">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div
            class="text-center mt-4 display-5 font-weight-bold text-primary text-uppercase mb-1"
          >
           View Partners Accounts
          </div>
          <div
            class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
          >
        <a href="{{ url('customer/partner-accounts') }}" class="btn btn-primary btn-block">View</a>
          
          </div>
        </div>
        <div class="col-auto">
        </div>
      </div>
    </div>
  </div>
</div> 


</div>
<br><br>

  
</div>



@endsection