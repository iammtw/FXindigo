@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
     @endif
    <div class="row mt-4">
        <div class="col-lg-12 col-md-12 col-sm-6">
            <div class="card shadow mt-4 mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Update your Payment information</h6>
                </div>

                <div class="card-body">
                    Choose your Payment Method Then Add it's information.
                    <br> <br>
                    
                <form action="{{ url('customer/payment/email') }}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="">Payment Type</label>
                        <select name="type" class="form-control" id="">
                            <option value="Skrill">Skrill</option>
                            <option value="Perfect money">Perfect money</option>
                        </select>
                    </div>

                    <div class="form-group">
                        
                        <label for="text">Account Title</label>
                        <input type="text" id="text" name="account_holder" class="form-control">

                    </div>
                    <div class="form-group">
                        
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email here..">

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
</div>


@endsection