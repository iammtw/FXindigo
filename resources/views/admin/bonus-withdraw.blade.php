@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Bonus Withdraw</h1>
         
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bonus Withdraw</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Amount</th>
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
                    <td> {{ $i }} </td>
                    <td>${{ $withdraw->amount }}</td>
                    <td>{{ $withdraw->created_at->format('d M Y') }}</td>
                    <td>{{ $withdraw->created_at->format('h:i A') }}</td>
                    <td>
                       @if ($withdraw->status == "Approved")
                           {{ $withdraw->status  }}
                       @else
                       <a href="{{ url('admin/bonus-withdraw/'.$withdraw->id."/approve") }}" class="btn btn-success">Approve</a>
                       <a href="{{ url('admin/bonus-withdraw/'.$withdraw->id."/decline") }}" class="btn btn-danger">Decline</a>
                       @endif
                    </td>
                    
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection