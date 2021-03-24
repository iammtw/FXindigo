@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Payment</h1>
         
          <div class="card shadow mb-4">
              
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Payment Options</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Type</th>
                      <th>Account Holder</th>
                      <th>Account Number</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($payments as $payment)
                   <?php $i++; ?>
                    <tr>
                        <td> {{ $i }} </td>
                        <td>{{ $payment->type }}</td>
                        <td>{{ $payment->account_holder }}</td>
                        <td>{{ $payment->account_number }}</td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>


@endsection