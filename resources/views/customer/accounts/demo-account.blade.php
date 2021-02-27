@extends('customer.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800">Create Demo Account</h1>
    @if (session('msg'))
            <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
    @endif
          <div class="card shadow mt-4 mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Create Demo Account</h6>

            </div>

            <div class="card-body">
                
              
            <form action="{{ url('customer/demo-account') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for=""> Account title  </label>
                    <input type="text" name="name" required class="form-control" id="">
                </div>

                <div class="form-group">
                    <label for=""> Currency  </label>
                    <select name="currency" class="form-control" id="">
                    <option value="USD" selected="selected" label="US dollar">USD</option>
                </select>
                    
                </div>
                <div class="form-group">
                    <label for=""> Leverage  </label>
                    <input type="number" name="leverage" required class="form-control" id="">
                </div>
                 <div class="form-group">
                    <label for=""> Balance  </label>
                    <input type="number" name="balance" required class="form-control" id="">
                </div>
            

                <div>
                    <button type="submit" class="btn btn-info btn-block">Create</button>
                </div>
            
            </form>


            </div>
          </div>
</div>


          
          @endsection

      
