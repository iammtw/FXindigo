@extends('admin.layouts.main')
@section('content')
<div class="row">         
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-warning text-uppercase mb-1"
            >
            <a href="{{url('admin/deposit-requests')}}" class="text-info">Deposit Requests</a>
          
            </div>
            <div
              class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
            >
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
</div> 
  
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
      <div class="card-body">
        <div class="row no-gutters align-items-center">
          <div class="col mr-2">
            <div
              class="text-center display-5 font-weight-bold text-info text-uppercase mb-1"
            >
            <a href="{{url('admin/withdraw-requests')}}" class="text-info">Withdraw Requests</a>
          
            </div>
            <div
              class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
            >
            </div>
          </div>
          <div class="col-auto">
            <i class="fas fa-users fa-2x text-gray-300"></i>
          </div>
        </div>
      </div>
    </div>
</div> 
</div>
          
@endsection