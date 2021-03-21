<<<<<<< HEAD
@extends('admin.layouts.main')
@section('content')
         
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Account Deposit Requests</h6>
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
                      @if (App\User::find(Auth::id())->role == "admin")
                      <th>Action</th>
                      @endif
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
                    @if (App\User::find(Auth::id())->role == "admin")
                    <td>

                        @if ($deposit->status == "Pending")
                        
                        <a href="{{ url('admin/account-deposit/'.$deposit->id.'/'.$deposit->account_id.'/approve/'.$deposit->amount) }}" 
                          class="btn btn-success">Approve</a>
                        <a href="{{ url('admin/account-deposit/'.$deposit->id.'/'.$deposit->account_id.'/decline/'.$deposit->amount) }}" 
                          class="btn btn-danger">Decline</a>
                         
                        {{$deposit->status}}
                        @endif
  
                      </td>
                  
                      @else
                      @endif
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
=======
@extends('admin.layouts.main')
@section('content')
         
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Account Deposit Requests</h6>
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
                      @if (App\User::find(Auth::id())->role == "admin")
                      <th>Action</th>
                      @endif
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
                    @if (App\User::find(Auth::id())->role == "admin")
                    <td>

                        @if ($deposit->status == "Pending")
                        
                        <a href="{{ url('admin/account-deposit/'.$deposit->id.'/'.$deposit->account_id.'/approve/'.$deposit->amount) }}" 
                          class="btn btn-success">Approve</a>
                        <a href="{{ url('admin/account-deposit/'.$deposit->id.'/'.$deposit->account_id.'/decline/'.$deposit->amount) }}" 
                          class="btn btn-danger">Decline</a>
                         
                        {{$deposit->status}}
                        @endif
  
                      </td>
                  
                      @else
                      @endif
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
>>>>>>> b2412547901e36999b857369abaf9b65565a5f0e
@endsection