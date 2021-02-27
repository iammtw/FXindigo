@extends('customer.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">History</h1>
         
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">History</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Method</th>
                      <th>Amount</th>
                      <th>Username</th>
                      <th>Transaction ID</th>
                      <th>Client ID</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($history as $h)
                   <?php $i++; ?>
                   <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $h->method }}</td>
                    <td>${{ $h->amount }}</td>
                    <td>{{ $h->username }}</td>
                    <td>{{ $h->transaction_id }}</td>
                    <td>{{  App\User::where('username',$h->username)->first()->client_id }}</td>

                    <td>{{ $h->created_at->format('d M Y') }}</td>
                    <td>{{ $h->created_at->format('h:i A') }}</td>
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection