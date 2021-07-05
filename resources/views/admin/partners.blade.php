@extends('admin.layouts.main')
@section('content')

          <h1 class="h3 mb-2 text-gray-800">Partners</h1>
           @if (session('msg'))
                <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
            @endif
          <div class="card shadow mb-4">
              <div class="card-header py-3">
                  
              <h6 class="m-0 font-weight-bold text-primary">Partners</h6>
            </div>

            <div class="card-body">
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th> # </th>
                      <th>Username</th>
                      <th>User ID</th>
                      <th>Code</th>
                      {{-- <th>Link</th> --}}
                      <th> Current Bonus </th>
                      @if (App\User::find(Auth::id())->role == "admin")
                      <th> Bonus </th>
                      <th> Bonus History </th>
                      <th>Action</th>
                      @endif
                      <th>Joined Users</th>
                      @if (App\User::find(Auth::id())->role == "admin")
                      <th> Withdraw Requests </th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                   @foreach ($partners as $partner)
                   <?php $i++; ?>
                   <tr>
                     <td> {{ $i }} </td>
                   <td> {{ App\User::find($partner->user_id)->username }} </td>
                   <td> {{ App\User::find($partner->user_id)->client_id }} </td>
                   <td> <b>{{ $partner->code }}</b></td>
                   {{-- <td> {{ url('/register?refferal='.$partner->code) }} </td> --}}
                   <td> {{ round(App\Partner::find($partner->id)->bonus,3) }}</td>
                   @if (App\User::find(Auth::id())->role == "admin")
                  <td>
                   
                    <form action="{{ url('admin/add-bonus/'.$partner->id) }}" class="form-inline" method="post" > 
                      @csrf
                      <div>
                          <input type="text" class="form-control input-sm" name="amount" required class="form-control" onkeypress="return isFloat(event)" style="width: 100px;">
                      </div>
                      
                        <div class="ml-1">
                          <button type="submit" class="btn btn-info">+</button>
                        </div>
                    </form>
                        
                   
                  </td>

                  <td>
                  <a href="{{ url('admin/bonus-history/'.$partner->id) }}" class="btn btn-info"> View </a>
                  </td>


                   <td>
                       @if ($partner->status == "Pending")
                         
                          <a href="{{ url('admin/partner/'.$partner->id.'/approve') }}" class="btn btn-success">Approved</a>
                           <a href="{{ url('admin/partner/'.$partner->id.'/decline') }}" class="btn btn-danger">Decline</a>
                           
                       @else
                            <b>{{ $partner->status }}</b>
                       @endif
                      
                   </td>
                   @endif                   
                   <th>

                    <?php

                    $users = App\User::where('referred',$partner->code)->get();
                    $checkJoinedUser = App\User::where('referred',$partner->code)->count();
                    if(empty($users)){
                      ?> None <?php
                      
                    } else {
                    ?> <a href="{{ url('admin/partners/'.$partner->code) }}" >
                    <span class="badge badge-light">{{ $checkJoinedUser }}</span>
                    
                    </a> <?php
                    }


                    ?>

                   </th>
                   @if (App\User::find(Auth::id())->role == "admin")
                    <th>
                        <?php $pendingRequestsCount = App\Bonus_withdraw::where('partner_id',$partner->id)->where('status','Pending')->count(); ?>
                         <a href="{{ url('admin/bonus-withdraw/'.$partner->id) }}" class="btn btn-primary">
                          Check <span class="badge badge-light">{{ $pendingRequestsCount }}</span>
                        
                        </a>

                         
                    </th>
  
                   @endif
                  </tr>
                   @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          @endsection