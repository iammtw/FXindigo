@extends('customer.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Deposits</h1>
          
          <div class="card shadow mb-4">

            @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
    @endif

              <div class="card-header py-3">
                <a href="{{ url('customer/add-deposit') }}" class="btn btn-primary" style="float:right"> Deposit Now </a>
              <h6 class="m-0 font-weight-bold text-primary">All Deposits</h6>
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
                   @foreach ($deposits as $deposit)
                   <tr>
                    <td>${{ $deposit->amount }}</td>
                    <td>{{ $deposit->payment_method }}</td>
                    <td>{{ $deposit->created_at->format('d M Y') }}</td>
                    <td>
                      @if ($deposit->status == "Approved")
                        <button class="btn btn-success">{{ $deposit->status }}</button>

                      @else
                        <button class="btn btn-dark">{{ $deposit->status }}</button> 
                    <a href="{{ url('customer/delete-deposit/'.$deposit->id) }}" class="btn btn-danger">Delete</a>
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