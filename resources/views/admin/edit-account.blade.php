@extends('admin.layouts.main')
@section('content')

<div class="container mt-4">
    <h1 class="h3 mb-4 text-gray-800">Edit Account</h1>
    @if (session('msg'))
        <span class=" mt-2 alert alert-danger"> {{ session('msg') }} </span>
    @endif
          <div class="card shadow mt-4 mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Edit Account</h6>
            </div>

            <div class="card-body">
            <form action="{{ url('admin/trading-account/edit/'.$account->id) }}" method="post">
                @csrf

                <div class="form-group">
                    <label for=""> Account type </label>
                    <select name="type" class="form-control">
                        <option value="--" disabled>------Seleted------</option>
                        <option value="{{ $account->type }}">{{ $account->type }}</option>
                        <option value="--" disabled>------------------</option>
                        <option value="standard">Standard</option>
                        <option value="lowspread" >Low spread</option>
                        <option value="ecnpro">ECN Pro</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for=""> Leverage  </label>
                    <input type="number" name="leverage" value="{{ $account->leverage}}" required class="form-control" id="">
                </div>
                
                <div class="form-group">
                    <label for=""> Account ID  </label>
                    <input type="number" name="account_id" value="{{ $account->account_id}}" required class="form-control" id="">
                </div>
            
                <div>
                    <button type="submit" class="btn btn-info btn-block">Update Account</button>
                </div>
            
            </form>
            </div>
          </div>
</div>

          @endsection

      
