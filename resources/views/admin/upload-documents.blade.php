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

                      <h6 class="m-0 font-weight-bold text-primary">Upload Documents</h6>
        
                    </div>
        
                    <div class="card-body">
                    <form action="{{ url('admin/user/'.$id."/upload-documents") }}" method="post" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="Identity card">Identity card</option>
                                <option value="Identity card Back">Identity card Back</option>
                                <option value="" disabled>-----------------------</option>
                                <option value="Driver's license">Driver's license</option>
                                <option value="Driver's license Back">Driver's license Back</option>
                                <option value="" disabled>-----------------------</option>
                                <option value="Passport">Passport</option>
                                <option value="Utility Bill">Utility Bill</option>
                                <option value="Bank Statement">Bank Statement</option>
                            </select>
                        </div>
        
                        <div id="inputField">
                            <div class="form-group custom-file">
                            <input type="file"  name="file" accept="image/png, image/jpeg, .pdf" required class="form-control custom-file-input" id="file1">
                            <label class="custom-file-label" > Choose file....  </label>
                        </div> 
                        <br>  
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

      
