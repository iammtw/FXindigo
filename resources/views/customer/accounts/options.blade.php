@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
  <h2>Trading Accounts</h2> 

  <div class="alert alert-info"> Your Selected Account is: <b> {{ App\Account::find($id)->name }} </b> <br> Account ID is: <b>{{ App\Account::find($id)->account_id }}</b>
  </div>

  @if (session('msg'))
    <div class="alert alert-danger">{{ session('msg') }}</div>
  @endif

  @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>  
  @endif

  <div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
                 Transfer to <b><span class="text-danger">{{ App\Account::find($id)->account_id  }}</span></b></button>
              </div>
              <form action="{{ url('customer/account/'.$id.'/deposit') }}" method="post">
                  @csrf
                  <div class="form-group">
                   <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1">$</span>
                    </div>
                    <input type="number" onkeypress="return isFloat(event)" required placeholder="Enter Amount" class="form-control" name="amount" />
                   </div>
                      
                  </div>
                  <button type="submit" class="btn btn-success btn-block">Transfer</b> 
              </form>
            
            </div>
            <div class="col-auto">
              <i class="fas fa-cash-register fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    
  </div>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Transfers to this account</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Serial #</th>
            <th>Amount</th>
            <th>Transfer By</th>
            <th>Transfer By (ID)</th>
            <th>Account Title</th>
            <th>Account ID</th>
            <th>Transfer to</th>
            <th>Transfer to (ID)</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=0; ?>
          @foreach ($deposits as $deposit)
          <?php $i++; ?>
          <tr>
            <td>{{ $i }}</td>
          <td>${{ $deposit->amount }}</td>
          <td>
            @if ($deposit->user_id != null)
            {{ App\User::find($deposit->user_id)->username}}
            @else
            {{ App\User::find(App\Account::find($deposit->account_id)->user_id)->username }}
            @endif
           
          </td>
          <td>
            @if ($deposit->user_id != null)
            {{ App\User::find($deposit->user_id)->client_id}}
            @else
            {{ App\User::find(App\Account::find($deposit->account_id)->user_id)->client_id }}
            @endif
          </td>
          <td>{{ App\Account::find($deposit->account_id)->name }}</td>
          <td>{{ App\Account::find($deposit->account_id)->account_id }}</td>
          <td>{{ App\User::find(App\Account::find($deposit->account_id)->user_id)->username }}</td>
          <td>{{ App\User::find(App\Account::find($deposit->account_id)->user_id)->client_id }}</td>
          <td>{{ $deposit->created_at->format('d M Y') }}</td>
          <td>{{ $deposit->created_at->format('h:i A') }}</td>
          <td>
            @if ($deposit->status == "Approved")
              <button class="btn btn-success">{{ $deposit->status }}</button>

            @else
            @if ($deposit->status != "Declined")
            <a href="{{ url('/customer/delete-account-deposit/'.$deposit->id) }}" class="btn btn-danger">Delete</a>
            <button class="btn btn-dark">{{ $deposit->status }}</button> 
            @else
            <button class="btn btn-dark">{{ $deposit->status }}</button> 
            @endif

            @endif
          </td>
          
        </tr>
          @endforeach

        </tbody>
      </table>
    </div>
  </div>
  </div>
  
  @if(isset($_GET['p']))
  
  @else

  <div class="row">
    <div class="col-xl-12 col-md-12 mb-4">
      <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
          
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div
                class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
              >
                  Transfer from <b><span class="text-danger">{{ App\Account::find($id)->account_id  }}</span></b></button>
              </div>
              <form action="{{ url('customer/account/'.$id.'/withdraw') }}" method="post">
                  @csrf
                  <div class="form-group">
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">$</span>
                      </div>
                      <input type="number" onkeypress="return isFloat(event)" required placeholder="Enter Amount" class="form-control" name="amount" />
                    </div>
                  </div>
                  <button type="submit" class="btn btn-success btn-block"> Transfer </button>
              </form>
            
            </div>
            <div class="col-auto">
              <i class="fas fa-cash-register fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>

  <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Transfers from this account</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Serial #</th>
              <th>Amount</th>
              <th>Transfer By</th>
              <th>Transfer By (ID)</th>
              <th>Account Title</th>
              <th>Account ID</th>
              <th>Transfer to</th>
              <th>Transfer to (ID)</th>
              <th>Date</th>
              <th>Time</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=0; ?>
            @foreach ($withdraws as $withdraw)
            <?php $i++; ?>
            <tr>
              <td>{{ $i }}</td>
            <td>${{ $withdraw->amount }}</td>
            <td>
              @if ($withdraw->user_id != null)
              {{ App\User::find($withdraw->user_id)->username}}
              @else
              {{ App\User::find(App\Account::find($withdraw->account_id)->user_id)->username }}
              @endif
             
            </td>
            <td>
              @if ($withdraw->user_id != null)
              {{ App\User::find($withdraw->user_id)->client_id}}
              @else
              {{ App\User::find(App\Account::find($withdraw->account_id)->user_id)->client_id }}
              @endif
            </td>
            <td>{{ App\Account::find($withdraw->account_id)->name }}</td>
            <td>{{ App\Account::find($withdraw->account_id)->account_id }}</td>
            <td>{{ App\User::find(App\Account::find($withdraw->account_id)->user_id)->username }}</td>
            <td>{{ App\User::find(App\Account::find($withdraw->account_id)->user_id)->client_id }}</td>
            <td>{{ $withdraw->created_at->format('d M Y') }}</td>
            <td>{{ $withdraw->created_at->format('h:i A') }}</td>
            <td>
              @if ($withdraw->status == "Approved")
                <button class="btn btn-success">{{ $withdraw->status }}</button>
              @else
                @if ($withdraw->status != "Declined")
                <a href="{{ url('/customer/delete-account-withdraw/'.$withdraw->id) }}" class="btn btn-danger">Delete</a>
                <button class="btn btn-dark">{{ $withdraw->status }}</button> 
                @else
                <button class="btn btn-dark">{{ $withdraw->status }}</button> 
                @endif
              @endif
            </td>
            
          </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  @endif

</div>
@endsection