@extends('admin.layouts.main')
@section('content')
          <h1 class="h3 mb-2 text-gray-800">Users</h1>
          <div class="card shadow mb-4">
            @if (session('msg'))
                <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
            @endif
              <div class="card-header py-3">
                <a href="{{ url('admin/users/export') }}" class="btn btn-primary" style="float:right"> Export to Excel </a>

              <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> # </th>
                      <th>ID</th>
                      <th>Username</th>
                      <th>Balance</th>
                      <th>Documents</th>
                      <th>Documents Status</th>
                      {{-- <th> KFC </th> --}}
                      <th> Trading Accounts </th>
                      @if (App\User::find(Auth::id())->role == "admin")
                      <th> Add Balance </th>
                      @endif
                      <th> Email </th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $i=0; ?>
                        @foreach ($users as $user)
                         <?php $i++; ?>
                       
                   <tr>
                        <td> {{ $i }} </td>
                        <td><a href="{{ url('admin/user/'.$user->id) }}"> {{ $user->client_id }} </a></td>
                   <td><a href="{{ url('admin/user/'.$user->id) }}"> {{ $user->username }} </a></td>
                   
                   <td>
                     <?php $balance = App\balance::where('user_id',$user->id)->first(); ?>
                     @if ($balance)
                     ${{ App\balance::where('user_id',$user->id)->first()->amount }}
                     @else
                     $0
                     @endif
                   </td>
                   <td>
                        <a href="{{ url('admin/user/'.$user->id.'/documents') }}">View </a>
                   </td>
                   
                  <td>

                    @if ($user->doc_status == "Verified")
                    <div class="alert alert-success">{{ $user->doc_status }}</div>
                    @else
                       @if ($user->doc_status != null)
                          <div class="alert alert-danger">{{ $user->doc_status }}</div>
                        @else

                        @endif
                    @endif

                      
                   </td>
                   <td>
                    <a href="{{ url('admin/users/'.$user->id.'/accounts') }}">View </a>
                   </td>
                   @if (App\User::find(Auth::id())->role == "admin")
                   <td>
                        <form action="{{ url('admin/add-balance/'.$user->id) }}" class="form-inline" method="post" > 
                          @csrf
                          <div>
                              <input type="text" class="form-control input-sm" name="amount" required class="form-control" onkeypress="return isFloat(event)" style="width: 100px">
                          </div>
                           
                            <div class="ml-1">
                              <button type="submit" class="btn btn-info">+</button>
                            </div>
                      </form>
                   </td>
                   @endif
                   <td>
                    <form action="{{ url('admin/mail/'.$user->email.'/'.$user->username) }}" class="form-inline" method="post" > 
                      @csrf
                      <div>
                          <textarea type="text" class="form-control description" name="content" required class="form-control" style="width: 120px">

                          </textarea>
                      </div>
                       
                        <div class="ml-1">
                          <button type="submit" class="btn btn-info">Send</button>
                        </div>
                  </form>
                   </td>
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection