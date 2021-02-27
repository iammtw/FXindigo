@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
<h2>Client</h2>


<div class="row">
  <div class="col-xl-12 col-md-12 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
      <div class="card-body">
            <div class="row no-gutters align-items-center">
            <div class="col mr-2">
            <a href="{{ url('customer/become-our-partner') }}" class="btn btn-primary btn-lg btn-block" 
                    style="font-family:Verdana, Geneva, Tahoma, sans-serif">
                        Become our Partner!</a>
            </div>
            </div> <br>
            <div class="table-responsive">
                <table class="table table-stripped">
                    <tr>
                        <td> Referral Status </td>
                        <td> <b> 
                        @if ($code)
                          {{ $code->status }}
                            
                        @endif </b></td>
                    </tr>
                    <tr>
                        <td>Referral Code </td>
                        <td>
                          @if ($code)
                            @if ($code->status == "Approved")
                              <b> {{ $code->code }}</b>
                            @else
                                not approved
                            @endif
                        @endif
                           
                        </td>
                    </tr>
                    <tr>
                        <td>Referral Link </td>
                        <td>
                          @if ($code)
                          @if ($code->status == "Approved")
                         
                           <b> <a href="{{ url('/register?refferal='.$code->code)  }}" > {{ url('/register?refferal='.$code->code)  }} </a></b>
                               
                            @else
                                not approved
                            @endif 
                        @endif
                          
                        </td>
                    </tr>

                    <tr>
                      <td>Referral Bonus </td>
                      <td>
                          @if ($code)
                          {{ $code->bonus }}

                      (<a href="{{ url('customer/bonus-history/'.$code->id) }}" class="btn-btn-primary"> View Bonus History </a>)
                          @else
                          @endif
                      </td>
                  </tr>
                  @if($code)
                  <tr>
                    <td>Add Withdraw  </td>
                    <td>
                      <form action="{{ url('customer/bonus-withdraw/'.$code->id) }}" class="form-inline" method="post" > 
                        @csrf
                        
                        <div>
                            <input type="number" class="form-control input-sm" placeholder="Enter Amount" name="amount" required class="form-control">
                        </div>
                         
                          <div class="ml-1">
                            <button type="submit" class="btn btn-info">+</button>
                          </div>
                         
                      </form>
                    </td>
                </tr>
                @endif


                </table>
            </div>
      </div>
    </div>
  </div>

  @if (session('msg'))
    <div class="alert alert-danger ">{{ session('msg') }}</div>
  @endif

  
</div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Partners</h6>
      </div>

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th>#</th>
                <th>Name</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
              @foreach ($partners as $partner)
              <?php $i++; ?>
              <tr>
                  <td>{{$i}}</td>
              <td>{{ $partner->name }}</td>
              <td>{{ $partner->created_at->format('d M Y') }}</td>
            </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="card shadow mb-4">
      <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">All Withdraws Requests</h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>#</th>
              <th>Amount</th>
              <th> Status </th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
              <?php $j=0; ?>
            @foreach ($withdraws as $withdraw)
             <?php $j++; ?>
            <tr>
            <td>{{ $j }}</td>
            <td>{{ $withdraw->amount }}</td>
            <td> 
              @if ($withdraw->status == "Approved")
                <button class="btn btn-success">{{ $withdraw->status }}</button>

              @else
                <button class="btn btn-dark">{{ $withdraw->status }}</button> 
              @endif
            </td>
            <td>{{ $withdraw->created_at->format('d M Y') }}</td>
          </tr>
            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>





@endsection