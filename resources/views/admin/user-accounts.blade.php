@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Accounts</h1>
          <div class="card shadow mb-4">

              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Accounts</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> # </th>
                     <th> Account Title </th>
                     <th> Account ID </th>
                     <th> Type </th>
                     <th> Currency </th>
                     <th> Leverage </th>
                    <th> Deposit History </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach ($accounts as $account)
                    <?php $i++; ?>
                   <tr>
                     <td> {{ $i }} </td>
                    <td>{{ $account->name }}</td>
                    <td>
                        @if($account->account_id !=null)
                            {{ $account->account_id }}
                        @else
                        
                        <form action="{{ url('admin/trading-account/'.$account->id) }}" class="form-inline" method="post" > 
                          @csrf
                          <div>
                              <input type="text" class="form-control input-sm" name="accountID" required class="form-control">
                          </div>
                           
                            <div class="ml-1">
                              <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                      </form>
                        
                        
                        
                        @endif
                        
                       
                        
                    </td>
                    <td>{{ $account->type }}</td>
                    <td>{{ $account->currency }}</td>
                    <td>{{ $account->leverage }}</td>
                    <td>

                        <a href="{{ url('admin/users/account/'.$account->id) }}" class="btn btn-primary">Check</a>
                    </td>
                   
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection