@extends('customer.layouts.main')
@section('content')
<div class="container mt-4">
    <h2>Partners</h2>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Partners</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Serial #</th>
                      <th>Name</th>
                      <th>Accounts #</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i=0; ?>
                    @foreach ($partners as $partner)
                    <?php $i++; ?>
                    <tr>
                      <td>{{ $i }}</td>
                      <td><a href="{{ url('customer/partner-accounts/'.$partner->id) }}">{{ $partner->name }}</a></td>
                      <td>{{ App\Account::where('user_id',$partner->id)->count() }}</td>
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