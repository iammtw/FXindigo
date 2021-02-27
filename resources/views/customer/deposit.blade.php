@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800" style="font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif">FXindigo</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-success"> {{ session('msg') }} </span>
    @endif
    <div class="card shadow mt-4 mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Deposit</h6>
        </div>
        <div class="card-body">
           <div class="row">
               <div class="col-md-6 offset-3">
                <form action="{{ url('customer/add-deposit') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for=""> Enter Amount </label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">$</span>
                              </div>
                             <input type="text" name="amount" onkeypress="return isFloat(event)" required class="form-control" id="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for=""> Payment Method </label>
                       <select name="payment_method" class="form-control" id="">
                           <option value="Skrill">Skrill</option>
                           <option value="Perfect Money">Perfect Money</option>
                           <option value="Bitcoin">Bitcoin</option>
                           <option value="Visa">Visa</option>
                           <option value="Mastercard">Mastercard</option>
                           <option value="Local Bank transfer">local bank transfer</option>
                            <option value="Paypal">Paypal</option>
                       </select>
                    </div>
                   
                    <div>
                        <button type="submit" class="btn btn-info btn-block">Deposit</button>
                    </div>
                </form>
               </div>
           </div>
        </div>
    </div>
</div>

@endsection

      
