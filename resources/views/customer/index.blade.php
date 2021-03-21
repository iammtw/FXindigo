@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
  <h2>Client</h2>

  @if (App\User::find(auth::id())->doc_status != "Verified")
    <div class="row">
      <div class="col-xl-12 col-md-12 mb-4">
        <div class="card border-left-danger bg-danger shadow">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">
                <div class="text-center display-5 font-weight-bold text-white text-capitalize" >
                  <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                  You're not verified yet, <a href="{{ url('customer/verification') }}" style="color:white;text-decoration:underline">Please upload documents</a> !!
                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
                Balance
              </div>
              <div
                class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
              >
              ${{ $amount }}
              
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-users fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-3">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
            <a href="{{ url('customer/add-deposit') }}"> Deposit </a>
              </div>
            
            </div>
            <div class="col-auto">
              <i class="fas fa-cash-register fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-3">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
            <a href="{{ url("customer/add-withdraw") }}"> Withdraw</a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-globe fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-4 col-md-4 mb-3">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
            <a href="{{ url("customer/transfer") }}"> Internal Transfer</a>
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-globe fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
            >
              <a href="#"> Total Accounts </a>
            </div>
            <div
              class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
            >
           {{ App\Account::where('user_id',auth::id())->count() }}
            </div>
          </div>
        
        </div>
      </div>
    </div>

   
    
  </div>
</div>


@endsection