@extends('customer.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Withdraws</h1>
          <div class="card shadow mb-4">
            @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
             @endif
              <div class="card-header py-3">
                <a href="{{ url('customer/add-withdraw') }}" class="btn btn-primary" style="float:right"> Wthdraw </a>
              <h6 class="m-0 font-weight-bold text-primary">All Winthdraws</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Amount</th>
                      <th>Payment Method</th>
                      <th>Date</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                   @foreach ($withdraws as $withdraw)
                   <tr>
                    <td>${{ $withdraw->amount }}</td>
                    <td>{{ $withdraw->payment_method }}</td>
                    <td>{{ $withdraw->created_at->format('d M Y') }}</td>
                    <td> 
                      @if ($withdraw->status == "Approved")
                        <button class="btn btn-success">{{ $withdraw->status }}</button>

                      @else
                        <button class="btn btn-dark">{{ $withdraw->status }}</button> 
                    <a href="{{ url('customer/delete-withdraw/'.$withdraw->id) }}" class="btn btn-danger">Delete</a>

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