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
                    <h6 class="m-0 font-weight-bold text-primary">Add your Bank Details</h6>
                </div>

                <div class="card-body">
                    
                <form action="{{ url('customer/payment/bank') }}" method="post" >
                    @csrf

                    <div class="form-group">
                        <label for="">Bank Name</label>
                        <input type="text" name="bank_name" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Branch Code</label>
                        <input type="text" name="bank_branch_code" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Account Holder</label>
                        <input type="text" name="account_holder" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">Account Number</label>
                        <input type="text" name="account_number" class="form-control" id="">
                    </div>
                    <div class="form-group">
                        <label for="">IBAN</label>
                        <input type="text" name="iban" class="form-control" id="">
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