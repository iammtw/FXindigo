@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Pending</h1>
         
          @if (session('msg'))
          <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
      @endif

          <div class="card shadow mb-4">
              <div class="card-header py-3">
                <a href="{{ url('admin/users/pending/export') }}" class="btn btn-primary" style="float:right"> Export to Excel </a>
              <h6 class="m-0 font-weight-bold text-primary">Pending</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Client ID</th>
                      <th>Username</th>
                      <th>Email</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($users as $user)
                   <?php $i++; ?>
                   <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->client_id }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ url('admin/pending-user/'.$user->id) }}" class="btn btn-primary">
                            Click to verify
                        </a>
                    </td>
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection