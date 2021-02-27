@extends('customer.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Bonus History</h1>
         
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Bonus History</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Partner ID</th>
                      <th>Amount</th>
                      <th> Time </th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($history as $h)
                   <?php $i++; ?>
                   <tr>
                    <td>{{ $i }}</td>
                    <td>{{ App\Partner::find($h->partner_id)->code }}</td>
                    <td>${{ $h->bonus }}</td>
                    <td>{{ $h->created_at->format('h:i A') }}</td>
                    <td>{{ $h->created_at->format('d M Y') }}</td>
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection