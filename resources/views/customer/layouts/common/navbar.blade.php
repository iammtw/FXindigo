<nav class="navbar navbar-expand-lg navbar-dark bg-primary border-bottom">
  
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
 
 <img src="{{url('logo.png')}}" height="50px" width="100px" alt="" style="margin-left: 500px;">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
      
        <li class="nav-item">
            <a href="{{ url('/customer/change-password') }}" class="btn btn-primary">Change password</a>
        </li> &nbsp;
      <form action="{{ url('logout') }}" method="post">
        @csrf
          <li class="nav-item">
            <button class="btn btn-primary">Logout</button>
          </li>
        </form>
      </ul>
    </div>
  </nav>
  <br>