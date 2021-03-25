@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
    <h2>Add a Payment Method</h2>

  

        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      
                        <div class="col-md-4">
                            <div  class="mb-0 text-center display-4">
                               <i class="fa fa-university"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-4 display-5">
                            <span class="text-lg text-bolder">Direct Bank Transfer</span>
                        </div>
                        
                        <div class="col-md-2">
                            <a href="{{ url('customer/payment/bank') }}"  class="btn btn-success btn-block">Setup</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>

        <h2>Other'ss Available</h2>
    
        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      
                        <div class="col-md-4">
                            <div  class="mb-0 text-center display-4">
                               <i class="fa fa-university"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-4 display-5">
                            <span class="text-lg text-bolder">Skrill</span>
                        </div>
                        
                        <div class="col-md-2">
                            <a href="{{ url('customer/payment/skrill') }}"  class="btn btn-success btn-block">Setup</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      
                        <div class="col-md-4">
                            <div  class="mb-0 text-center display-4">
                               <i class="fa fa-university"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-4 display-5">
                            <span class="text-lg text-bolder">Perfect Money</span>
                        </div>
                        
                        <div class="col-md-2">
                            <a href="{{ url('customer/payment/pm') }}"  class="btn btn-success btn-block">Setup</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
    
        <div class="col-xl-12 col-md-12 mb-6">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                      
                        <div class="col-md-4">
                            <div  class="mb-0 text-center display-4">
                               <i class="fa fa-university"></i>
                            </div>
                        </div>
                        
                        <div class="col-md-4 display-5">
                            <span class="text-lg text-bolder">Easypaisa/JazzCash</span>
                        </div>
                        
                        <div class="col-md-2">
                            <a href="{{ url('customer/payment/number') }}"  class="btn btn-success btn-block">Setup</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
    
      
    
        
  

@endsection