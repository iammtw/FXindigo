@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
<h2>Real Trading Accounts</h2>

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
            <a href="{{ url('customer/select-account/'.$account->id.'?p=d3d9446802a44259755d38e6d163e820') }}"  class="text-lg"> {{$account->name}} </a>
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

</div>

@endsection