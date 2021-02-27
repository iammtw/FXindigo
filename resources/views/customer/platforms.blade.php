@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
<h2>Trading Platforms</h2>
<div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div
                    class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
                >
            <div  class="mb-0 text-center display-5">
                <img src="{{ url('img/windows.png') }}" alt=""> 
            </div>
                <br>
                
                <a href="{{ url('https://www.metatrader5.com/en/download ') }}" class="btn btn-primary btn-block">
            Windows
                </a>
                </div>
                <div
                    class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
                >
            
                
                </div>
                </div>
                <div class="col-auto">
                
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div
                    class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
                >
            <div  class="mb-0 text-center display-5">
                <img src="{{ url('img/android.png') }}" alt=""> 
            </div>
                <br>
                
                <a href="https://play.google.com/store/apps/details?id=net.metaquotes.metatrader5&hl" target="_blank" class="btn btn-primary btn-block">
                    Android
                </a>
                </div>
                <div
                    class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
                >
            
                
                </div>
                </div>
                <div class="col-auto">
                
                </div>
            </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                <div
                    class="text-center display-5 font-weight-bold text-primary text-uppercase mb-1"
                >
            <div  class="mb-0 text-center display-5">
                <img src="{{ url('img/apple.png') }}" alt=""> 
            </div>
                <br>
                
                <a href="https://apps.apple.com/us/app/metatrader-5/id413251709" target="_blank" class="btn btn-primary btn-block">
                    iOS
                </a>
                </div>
                <div
                    class="h5 mb-0 text-center display-5 font-weight-bold text-gray-800"
                >
            
                
                </div>
                </div>
                <div class="col-auto">
                
                </div>
            </div>
            </div>
        </div>
    </div>

    
</div>



@endsection