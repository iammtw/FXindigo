@extends('customer.layouts.main')
@section('content')

    <div class="container mt-4">
        <h1 class="h3 mb-2 text-gray-800">Payments</h1>
    
        <div class="col-md-12">
            <div class="card shadow mb-4">

                @if (session('msg'))
                    <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
                @endif
                <div class="card-header py-3">

                    @if (App\Payment::where('user_id',auth::id())->count() >= 2)
                    <button class="btn btn-secondary" style="float:right" disabled> Add Payment Method </button>
                    @else
                    <a href="{{ url('customer/payment/add') }}" class="btn btn-primary" style="float:right"> Add Payment Method </a>
                    @endif

                   
                    <h6 class="m-0 font-weight-bold text-primary">Your Banks</h6>
                </div>
                    
                    
    
                <div class="card-body">
                    
                    <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Account Holder</th>
                            <th>Account Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($payments as $payment)
                        <tr>
                        <td>{{ $payment->type }}</td>
                        <td>{{ $payment->account_holder }}</td>
                        <td>{{ $payment->account_number }}</td>
                        
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