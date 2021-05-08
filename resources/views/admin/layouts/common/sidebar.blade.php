
<ul class="navbar-nav sidebar  sidebar-dark accordion" style="background: #1E1A3F"  id="accordionSidebar">
 <a
   class="d-flex align-items-center justify-content-center"
href="{{ url('admin/dashboard') }}"
 >
   <div class="mx-3"> <img src="{{ url('logo-new.png') }}" height="40" width="90">  </div>
 </a>
 <hr class="sidebar-divider my-0" />
 <li class="nav-item active">
   <a class="nav-link" href="{{ url('admin/dashboard') }}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a
   >
 </li>

 <hr class="sidebar-divider" />

 <li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseThree"
    aria-expanded="true"
    aria-controls="collapseThree"
  >
    <i class="fas fa-fw fa-wallet"></i>
    <span>Wallet Requests</span>
  </a>
  <div
    id="collapseThree"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ url('admin/deposits') }}">Deposit Requests</a>
      <a class="collapse-item" href=" {{ url('admin/withdrawals') }} ">Withdraw Requests</a>
    
    </div>
  </div>
</li>
 

<li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseTwo"
    aria-expanded="true"
    aria-controls="collapseTwo"
  >
    <i class="fas fa-fw fa-sign-in-alt"></i>
    <span>Accounts</span>
  </a>
  <div
    id="collapseTwo"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">

      <a class="collapse-item" href=" {{ url('admin/trading-accounts') }} ">All Accounts
        <?php $num = App\Account::all()->count() ?>
        <span class="badge badge-danger">{{$num}}</span>
      </a>

      <a class="collapse-item" href=" {{ url('admin/trading-accounts/not-assign') }} ">Pending Accounts
        <?php $num = App\Account::where('account_id',null)->count() ?>
        <span class="badge badge-danger">{{$num}}</span>
      </a>

      <a class="collapse-item" href=" {{ url('admin/trading-accounts/standard') }} ">Standard Accounts
        <?php $num = App\Account::where('type','standard')->count() ?>
        <span class="badge badge-danger">{{$num}}</span>
      </a>

      <a class="collapse-item" href=" {{ url('admin/trading-accounts/lowspread') }} ">Lowspread Accounts
        <?php $num = App\Account::where('type','lowspread')->count() ?>
        <span class="badge badge-danger">{{$num}}</span>
      </a>

      <a class="collapse-item" href=" {{ url('admin/trading-accounts/ecnpro') }} ">ECN Pro Accounts
        <?php $num = App\Account::where('type','ecnpro')->count() ?>
        <span class="badge badge-danger">{{$num}}</span>
      </a>


      <a class="collapse-item" href="{{ url('admin/account-requests') }}">Accounts Details</a>
<a class="collapse-item" href="{{ url('admin/demo-accounts') }}">Demo Accounts Requests</a>
      
     
    </div>
  </div>
</li>

<li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseOne"
    aria-expanded="true"
    aria-controls="collapseOne"
  >
    <i class="fas fa-fw fa-users"></i>
    <span>Users</span>
  </a>
  <div
    id="collapseOne"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ url('admin/users') }}">Users
        <?php $users = App\User::where('status', null)->count() ?>
        <span class="badge badge-danger">{{$users}}</span>
      </a>
      <a class="collapse-item" href=" {{ url('admin/pending-users') }} ">Non-verify Users
        <?php $nonver = App\User::where('email_verified_at',null)->where('role','customer')->count() ?>
        <span class="badge badge-danger">{{$nonver}}</span>
      </a>

      <a class="collapse-item" href=" {{ url('admin/approved-users') }} ">Approved Users 
      <?php $appr = App\User::where('doc_status','Verified')->where('email_verified_at','!=',null)->where('role','customer')->count() ?>
        <span class="badge badge-danger">{{$appr}}</span> 
      </a>

      <a class="collapse-item" href=" {{ url('admin/pending-approved-users') }} ">Pending Users 
      <?php $pend = App\User::where('doc_status','Pending')->where('email_verified_at','!=',null)->where('role','customer')->count() ?>
        <span class="badge badge-danger">{{$pend}}</span> 
      </a>

      <a class="collapse-item" href=" {{ url('admin/non-approved-users') }} ">Non Approved Users
      <?php $nonappr = App\User::where('doc_status', null)->where('email_verified_at','!=',null)->where('role','customer')->count() ?>
        <span class="badge badge-danger">{{$nonappr}}</span>
      </a>
      
      <a class="collapse-item" href=" {{ url('admin/admin-users') }} ">Admin Users
      <?php $admin = App\User::where('role','admin')->count() ?>
        <span class="badge badge-danger">{{$admin}}</span>
      </a> 
     
    </div>
  </div>
</li>

<li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseFour"
    aria-expanded="true"
    aria-controls="collapseFour"
  >
    <i class="fas fa-fw fa-users"></i>
    <span>Partners</span>
  </a>
  <div
    id="collapseFour"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ url('admin/partners') }}">All Partners
        <?php $partner = App\Partner::all()->count() ?>
        <span class="badge badge-primary">{{$partner}}</span>
      </a>
      <a class="collapse-item" href=" {{ url('admin/approved-partners') }} ">Approved Partners
        <?php $approved = App\Partner::where('status','=','Approved')->count() ?>
        <span class="badge badge-primary">{{$approved}}</span>
      </a>
      <a class="collapse-item" href=" {{ url('admin/nonapproved-partners') }} ">Non Approved Partners
        <?php $nonapproved = App\Partner::where('status','!=','Approved')->count() ?>
        <span class="badge badge-primary">{{$nonapproved}}</span>
      </a>
     
    </div>
  </div>
</li>

@if (App\User::find(Auth::id())->role == "admin" || App\User::find(Auth::id())->role == "semiadmin" )

<li class="nav-item">
  <a class="nav-link" href="{{ url('admin/history') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>History (old)</span></a>
</li>

<li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseFive"
    aria-expanded="true"
    aria-controls="collapseFour"
  >
    <i class="fas fa-fw fa-users"></i>
    <span>History</span>
  </a>
  <div
    id="collapseFive"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ url('admin/deposit-history') }}">Deposit History</a>
      <a class="collapse-item" href=" {{ url('admin/withdraw-history') }} ">Withdraw History </a>
    </div>
  </div>
</li>



@endif

{{-- <li class="nav-item">
  <a class="nav-link" href="{{ url('admin/kyc') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>KYC</span></a>
</li> --}}




<li class="nav-item">
    <form action="{{ url('logout') }}" id="logout" method="post">
        @csrf
        <a href="javascript:$('#logout').submit();"" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </form>
</li>

</ul>
