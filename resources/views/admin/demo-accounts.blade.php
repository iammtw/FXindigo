@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Demo Accounts</h1>
          <div class="card shadow mb-4">

              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Demo Accounts</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                     <th> # </th>
                     <th> Account Title </th>
                     <th> Username </th>
                     <th> Client ID </th>
                     <th> Type </th>
                     <th> Currency </th>
                     <th> Leverage </th>
                     <th> Balance </th>
                     <th> Status </th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=0; ?>
                   @foreach ($demos as $demo)
                   <?php $i++; ?>
                   <tr>
                       <td> {{ $i }} </td>
                    <td>{{ $demo->name }}</td>
                    <td> {{ App\User::find($demo->user_id)->username }} </td>
                    <td> {{ App\User::find($demo->user_id)->client_id }} </td>
                    <td>{{ $demo->type }}</td>
                    <td>{{ $demo->currency }}</td>
                    <td>{{ $demo->leverage }}</td>
                     <td>{{ $demo->balance }}</td>
                    <td>
                     @if ($demo->status == "Pending")
                     <a href="{{ url('admin/demo-account/'.$demo->id.'/approve') }}" class="btn btn-success">Approve</a>
                     <a href="{{ url('admin/demo-account/'.$demo->id.'/decline') }}" class="btn btn-danger">Decline</a>
                     @else
                        {{ $demo->status }}
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