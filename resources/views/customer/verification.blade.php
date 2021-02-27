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
                      <h6 class="m-0 font-weight-bold text-primary">Personal Verification</h6>
        
                    </div>
        
                    <div class="card-body">
                        Upload your document here (Max size 2MB, only JPG/PNG/PDF format) or 
                        send your documents to <a href="mailto:support@fxindigo.com">support@fxindigo.com</a> 
                        <br> <br>
                        
                      
                    <form action="{{ url('customer/verification') }}" method="post" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="Identity card">Identity card</option>
                                <option value="Driver's license">Driver's license</option>
                                <option value="Passport">Passport</option>
                            </select>
                        </div>
        
                        <div id="inputField">
                            <div class="form-group custom-file">
                            <input type="file"  name="file" accept="image/png, image/jpeg, .pdf" required class="form-control custom-file-input" id="file1">
                            <label class="custom-file-label" > Choose front  </label>
                            </div> <br>  <br>
                         <div class="form-group custom-file" id="filegroup2">
                            <input type="file"  name="file2" accept="image/png, image/jpeg, .pdf"  class="form-control custom-file-input" id="file2">
                            <label class="custom-file-label"> Choose back </label>
                        </div> <br>
                        <br>
                        </div>
        
                        <div class="form-group" stl>
                            
                            <input type="checkbox" name="check" value="true"  required id=""> 
                            &nbsp; &nbsp;I certify the accuracy and relevance of uploaded documents. I certify the accuracy of such information and undertake to provide on request copies of the documents proof registration 
                            data  according to the  requirements of the customer agreement and regulations.
                            
                        </div>
        
                        <div>
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    
                    </form>
                    </div>

                    @if (session('error'))
                    <span class=" mt-2 alert alert-danger"> {{ session('error') }} </span>
                @endif

                  </div>
            </div> 
            
            {{-- ---- --}}

            <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="card shadow mt-4 mb-4">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Address Verification</h6>
        
                    </div>
        
                    <div class="card-body">
                        Upload your document here (Max size 2MB, only JPG/PNG/PDF format) or 
                        send your documents to <a href="mailto:support@fxindigo.com">support@fxindigo.com</a> 
                        <br> <br>
                        
                      
                    <form action="{{ url('customer/verification') }}" method="post" enctype="multipart/form-data">
                        @csrf
        
                        <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="form-control" id="">
                                <option value="Utility Bill">Utility Bill</option>
                                <option value="Bank Statement">Bank Statement</option>
                                
                            </select>
                        </div>
        
                        <div class="form-group custom-file">
                            
                            <input type="file" name="file" id="file3" accept="image/png, image/jpeg, .pdf" required class="form-control custom-file-input" id="">
                            <label for="" class="custom-file-label"> File </label>
        
                        </div> <br>
                       
                        <br>
        
                        <div class="form-group" stl>
                            <input type="checkbox" name="check" value="true"  required id=""> 
                            &nbsp; &nbsp;I certify the accuracy and relevance of uploaded documents. I certify the accuracy of such information and undertake to provide on request copies of the documents proof registration 
                            data  according to the  requirements of the customer agreement and regulations.
                        </div>
                        <div>
                            <button type="submit" class="btn btn-info btn-block">Submit</button>
                        </div>
                    </form>
                    </div>
                  </div>
            </div>  


                   {{-- -- --}}
                   <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card-header py-3">
                      <h6 class="m-0 font-weight-bold text-primary">Documents Uploaded</h6>
                    </div>
        
                    <div class="card-body">
                      
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Type</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody>
                          
                            @foreach ($documents as $document)
                            <tr>
                            <td> {{ $document->created_at->format('d M Y') }} </td>
                            <td> {{ $document->type }}</td>
                            <td> {{ $document->status }} </td>
                            <td>
                            @if ($document->status == "Approved")
                                It's Approved!
                            @else
                            <a href="{{ url('customer/verification/delete/'.$document->id) }}" class="btn btn-danger">
                              Delete
                              </a>
                            @endif
                            </td>
                        </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div>
                   </div>
</div>
</div>


          @endsection