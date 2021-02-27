<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"
        ><img src="assets/img/navbar-logo.png" alt="" /></a
      ><button
        class="navbar-toggler navbar-toggler-right"
        type="button"
        data-toggle="collapse"
        data-target="#navbarResponsive"
        aria-controls="navbarResponsive"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        Menu<i class="fas fa-bars ml-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#portfolio"
              >Products</a
            >
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">About</a>
          </li>
          
          @if (Route::has('login'))
              @auth
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ route('home') }}">My Account</a>
              </li>
          @else
              <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="{{ route('login') }}">Login/Regsiter</a>
              </li>
            @endauth
          @endif
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#location">Location</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->