@extends('admin.layouts.main')
@section('content')
          <h1 class="h3 mb-2 text-gray-800">Joined Users</h1>
          <div class="card shadow mb-4">
              <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Joined Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Client ID</th>
                      <th>Name</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($users as $user)
                   <?php $i++; ?>
                        <tr>
                          <td> {{ $i }} </td>
                          <td> {{ $user->client_id }} </td>
                            <td><a href="{{ url('admin/user/'.$user->id) }}"> {{ $user->name }} </a></td>
                            <td>{{ $user->email }}</td>
                        </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection