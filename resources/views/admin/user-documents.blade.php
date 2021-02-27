@extends('admin.layouts.main')
@section('content')

<div class="container ">
    <div class="row">

        @foreach ($documents as $document)
        {{-- One card --}}
        <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="card shadow mt-4 mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"> {{ $document->type }} </h6>
                </div>
            
                <div class="card-body">

                    <?php
                        $checkpdf = Illuminate\Support\Str::contains($document->file, ".pdf");
                    ?>
                    @if ($checkpdf == true)
                        <img src="{{ url('pdf.png') }}" height="100" width="80" alt="" style="margin-left:30%">
                    @else
                    <img src="{{ url('jpg.png') }}" height="100" width="80" alt="" style="margin-left:30%">

                        
                    @endif
                    <br> <br>
                        <a href="{{ url('storage/'.$document->file) }}" 
                            class="btn btn-primary btn-block" download>Download</a>
                    <br>
                    @if ($document->status == "Pending")
                    <div class="form-group offset-1">
                        <a href="{{ url('admin/user/'.$document->user_id.'/documents/'.$document->id.'/approve') }}" class="btn btn-success">Approve</a>
                        <a href="{{ url('admin/user/'.$document->user_id.'/documents/'.$document->id.'/decline') }}" class="btn btn-danger">Decline</a>
                    </div>
                    @endif

                    @if ($document->status == "Declined")
                    <div class="form-group">
                        <button class="btn btn-danger btn-block">{{$document->status}}</a>
                    </div>
                    @endif

                    @if ($document->status == "Approved")
                    <div class="form-group">
                        <button class="btn btn-success btn-block">{{$document->status}}</a>
                    </div>
                    @endif

                  
                      
                </div>
            </div>
        </div> 
        {{-- End card --}}
        @endforeach
    </div>
<hr> Document Status
    <div class="mt-2 text-center mb-2">
       
        @if (App\User::find($id)->doc_status == "Verified")
        <div class="row">
            <div class="col-md-6">
                <div class="alert alert-success"><b>Verified</b></div>
            </div>
            <div class="col-md-6">
                <a href="{{ url('admin/user-doc-status/'.$id.'/decline') }}" class="btn btn-block btn-danger">Decline</a>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <a href="{{ url('admin/user-doc-status/'.$id.'/approve') }}" class="btn btn-block btn-success">Approve</a>
            </div>
           
        </div>
        @endif
     </div>

@endsection

      
