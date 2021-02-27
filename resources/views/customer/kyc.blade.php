@extends('customer.layouts.main')
@section('content')

<div class="container ">
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
<div class="row">
              <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">KYC Forms</h6>
        
                    </div>
        
                    <div class="card-body">

                    <a href="{{ url('storage/'.$name) }}" download class="btn btn-primary">Download KYC Form</a>
<br> <br>
                        Fill KYC Form and Upload document here (Max size 2MB, only JPG/PNG/PDF format) 
                        <br> <br>
                        
                      
                    <form action="{{ url('customer/kyc') }}" method="post" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group custom-file">
                            <label class="custom-file-label">Choose File</label>
                            <input type="file" name="file" accept="image/png, image/jpeg, .pdf" required class="form-control custom-file-input" id=""> 
                        </div><br>
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

      
