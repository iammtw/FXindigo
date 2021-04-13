@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Deposit</h1>
         
          <div class="card shadow mb-4">
               @if (session('msg'))
                <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
            @endif
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Deposit</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Amount</th>
                      <th>Username</th>
                      <th>Client ID</th>
                      <th>Referred by</th>
                      <th>Payment Method </th>
                      <th>Date</th>
                      <th>Time</th>
                      @if(App\User::find(Auth::id())->role == "admin")
                      <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($requests as $deposit)
                   <?php $i++; ?>
                   <tr>
                     <td> {{ $i }} </td>
                    <td>${{ $deposit->amount }}</td>
                    <td>{{ App\User::find($deposit->user_id)->username }}</td>
                    <td>{{ App\User::find($deposit->user_id)->client_id }}</td>
                    <td>{{ App\User::find($deposit->user_id)->referred }}</td>
                    <td>{{ $deposit->payment_method }}</td>
                    <td>{{ $deposit->created_at->format('d M Y') }}</td>
                    <td>{{ $deposit->created_at->format('h:i A') }}</td>
                    @if(App\User::find(Auth::id())->role == "admin")
                    <td>
                    <a href="{{ url('admin/deposit/approve/'.$deposit->id) }}" class="btn btn-success">Approve</a>
                    <a href="{{ url('admin/deposit/decline/'.$deposit->id) }}" class="btn btn-danger">Decline</a>
                    </td>
                   @endif
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection