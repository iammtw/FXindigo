@extends('admin.layouts.main')
@section('content')

<div class="container ">
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
<div class="row">
              <div class="col-lg-8 col-md-8 col-sm-4 offset-1">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">

                      <h6 class="m-0 font-weight-bold text-primary">KYC Forms</h6>
        
                    </div>
        
                    <div class="card-body">
                    <form action="{{ url('admin/kyc') }}" method="post" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <input type="file" name="file" accept="image/png, image/jpeg, .pdf" required class="form-control" id="">
                        </div>
                        <br>
        
                        <div>
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    
                    </form>
                    </div>
                  </div>
            </div> 
            
            
</div>
          @endsection

      
