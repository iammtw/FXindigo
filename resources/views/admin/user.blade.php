@extends('admin.layouts.main')
@section('content')

<div class="container ">
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary"> {{ $user->name }}'s Profile </h6>
        
                    </div>
        
                    <div class="card-body">
                        <table class="table table-striped">
                            <tr>
                                <td> <b>Name</b> </td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td><b>Gender</b></td>
                                <td>{{ $user->gender }}</td>
                            </tr>
                            <tr>
                                <td><b>Email</b></td>
                                <td> {{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td><b>Phone number</b></td>
                                <td> {{ $user->phonenumber }}</td>
                            </tr>
                            <tr>
                                <td><b>Username</b></td>
                                <td>{{ $user->username }}</td>
                            </tr>
                            <tr>
                                <td><b>Nationality</b></td>
                                <td>{{ $user->Nationality }}</td>
                            </tr>
                            <tr>
                                <td><b>Address</b></td>
                                <td>{{ $user->Address }}</td>
                            </tr>
                            <tr>
                                <td><b>Postal Code</b></td>
                                <td>{{ $user->postalcode }}</td>
                            </tr>
                        </table>
                        <a href="{{ url('admin/user/'.$user->id.'/documents') }}" class="btn btn-primary btn-block">View Documents</a>
                        {{-- <a href="{{ url('admin/user/'.$user->id.'/documents') }}" class="btn btn-primary btn-block">Mark as Verified </a> --}}
                        @if (App\User::find(Auth::id())->role == "admin")
                        <a href="{{ url('admin/user/'.$user->id.'/upload-documents') }}" class="btn btn-primary btn-block">Upload Documents</a>
                       
                           
                            
                             @if (App\User::find($user->id)->role != "admin")
                    <a href="{{ url('admin/user-admin/'.$user->id) }}" class="btn btn-primary btn-block">   Mark as Admin </a>
                    @else
                       <button class="btn btn-primary btn-block"> Admin </button>
                    @endif
                    
                    @if (App\User::find($user->id)->role != "employee")
                    <a href="{{ url('admin/user-employee/'.$user->id) }}" class="btn btn-primary btn-block">   Mark as Employee </a>
                    @else
                       <button class="btn btn-primary btn-block"> Employee </button>
                    @endif
                    
                     @if (App\User::find($user->id)->role != "user")
                    <a href="{{ url('admin/user-user/'.$user->id) }}" class="btn btn-primary btn-block">   Marks as User </a>
                    @else
                       <button class="btn btn-primary btn-block"> User </button>
                    @endif
                    
                     @if (App\User::find($user->id)->status == "Deleted")
                            <a href="{{ url('admin/user/reactive/'.$user->id) }}" 
                                onclick="return confirm('Are you sure you want to reactive?');"  
                                class="btn btn-warning btn-block">Re Activate
                            </a>
                            @else
                            <a href="{{ url('admin/user/delete/'.$user->id) }}" 
                                onclick="return confirm('Are you sure you want to delete?');"  
                                class="btn btn-danger btn-block"> Delete
                            </a>
                            @endif
                           
                      @endif     
                       
                    </div>
                  </div>
            </div> 
            
            
</div>
          @endsection

      
