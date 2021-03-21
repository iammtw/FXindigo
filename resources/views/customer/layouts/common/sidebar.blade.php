<ul class="navbar-nav sidebar  sidebar-dark accordion" style="background: #1E1A3F"  id="accordionSidebar">
    <br>
 <a
   class="d-flex align-items-center justify-content-center"
href="{{ url('/home') }}"
 >
   <div class="mx-3"> <img src="{{ url("logo-new.png") }}" height="60" width="110"> </div>
 </a> <br>
 
 <?php

$status = App\User::find(auth::id())->doc_status;
$actualStatus = "Unverified";
if ($status == "Verified"){
    $actualStatus = "Verified";
} 

?>

 <li class="nav-item active">
  <a class="nav-link" href="{{ url('/home') }}">
    <span> {{ App\User::find(auth::id())->name }}</span> <span class="badge badge-pill badge-warning">{{$actualStatus}}</span> <br> <br>
   ClientID - <span>  {{ App\User::find(auth::id())->client_id }}</span>
  </a>
  
 

</li>

 <hr class="sidebar-divider my-0" />
 <li class="nav-item active">
   <a class="nav-link" href="{{ url('/home') }}">
     <i class="fas fa-fw fa-tachometer-alt"></i>
     <span>Dashboard</span></a
   >
 </li>

 <li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseThree"
    aria-expanded="true"
    aria-controls="collapseThree"
  >
    <i class="fas fa-fw fa-users"></i>
    <span>Wallet</span>
  </a>
  <div
    id="collapseThree"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href="{{ url('customer/deposit') }}">Deposit</a>
      <a class="collapse-item" href=" {{ url('customer/withdraw') }} ">Withdraw</a>
      <a class="collapse-item" href=" {{ url('/customer/transfer') }} ">Internal Transfer</a>
      <a class="collapse-item" href=" {{ url('customer/history') }} ">History</a>
    </div>
  </div>
</li>

{{-- ---- --}}

<li class="nav-item">
  <a
    class="nav-link collapsed"
    href="#"
    data-toggle="collapse"
    data-target="#collapseFive"
    aria-expanded="true"
    aria-controls="collapseFive"
  >
    <i class="fas fa-fw fa-users"></i>
    <span>Accounts</span>
  </a>
  <div
    id="collapseFive"
    class="collapse"
    aria-labelledby="headingTwo"
    data-parent="#accordionSidebar"
  >
    <div class="bg-white py-2 collapse-inner rounded">
      <a class="collapse-item" href=" {{ url('/customer/demo-account') }} ">Demo Accounts</a>
      <a class="collapse-item" href="{{ url('/customer/account') }}">Create new Real Account</a>
      <a class="collapse-item" href=" {{ url('customer/select-account') }} ">My Accounts</a>
      <?php
      
      $code = App\Partner::where('user_id',auth::id())->first();
      if($code != null){ 
        if($code->code != null){ ?>
            <a class="collapse-item" href=" {{ url('customer/partner-accounts') }} ">Partner Accounts</a>  <?php  
        }
      }
      
      
      ?>
      
    </div>
  </div>
</li>

  

<div class="sidebar-heading">
  Others
</div>
<hr class="sidebar-divider my-0" />


<li class="nav-item">
   <a
     class="nav-link collapsed"
     href="#"
     data-toggle="collapse"
     data-target="#collapseTwo"
     aria-expanded="true"
     aria-controls="collapseTwo"
   >
     <i class="fas fa-fw fa-users"></i>
     <span>Personal Profile</span>
   </a>
   <div
     id="collapseTwo"
     class="collapse"
     aria-labelledby="headingTwo"
     data-parent="#accordionSidebar"
   >
     <div class="bg-white py-2 collapse-inner rounded">
       <a class="collapse-item" href="{{ url('customer/change-password') }}">Change Password</a>
       <a class="collapse-item" href=" {{ url('customer/verification') }} ">Documents</a>
       <a class="collapse-item" href=" {{ url('customer/profile') }} ">Profile</a>
     </div>
   </div>
 </li>

 <li class="nav-item">
  <a class="nav-link" href="{{ url('/customer/platforms') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>Trading Platforms</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="{{ url('customer/partner') }}">
    <i class="fas fa-fw fa-table"></i>
    <span>Partners</span>
  </a>
</li>

<li class="nav-item">
    <form action="{{ url('logout') }}" id="logout" method="post">
        @csrf
        <a href="javascript:$('#logout').submit();" class="nav-link">
             <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </form>
</li>


</ul>
