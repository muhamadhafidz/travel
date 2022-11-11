

<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center">
  <div class="container-fluid">
    <div class="header-container d-flex align-items-center">
      <div class="logo mr-primary">
        <h1 class="text-light"><a href="index.html"><span>TIDUNG KECIL</span></a></h1>
      </div>

      <nav class="nav-menu d-none d-lg-block ml-auto mr-5">
        <ul>
          <li><a href="#team"></a></li>
          <li><a href="#team"></a></li>
          <li class="active"><a href="{{ route('user.home') }}#header">Home</a></li>
          <li><a href="{{ route('user.home') }}#about">About</a></li>
          <li><a href="{{ route('user.home') }}#portfolio">Gallery</a></li>
          <li><a href="{{ route('user.home') }}#snorkling">snorkling</a></li>
          <li><a href="{{ route('user.home') }}#camping">CAMPING</a></li>
          <li class=""><a href="{{ route('user.home') }}#footer">HUBUNGI KAMI</a></li>
          <li class="btn btn-dark rounded-pill" style="background-color: #1f1d1d"><a href="{{ route('user.tiket') }}" class="text-white">TIKET CAMPING</a></li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->nama }}
            </a>
            <div class="dropdown-menu">
              @if (Auth::user()->roles == 'admin')
              <a class="dropdown-item" href="{{ route('admin.dashboard.index') }}">Dashboard</a>
              @endif
              <a class="dropdown-item" href="#">Profil</a>
              <a class="dropdown-item" href="{{ route('user.pesanan') }}">Pesanan Saya</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </div>
          </li>
          @else
          <li class="btn btn-outline-dark rounded-pill ml-2" style="border: #1f1d1d solid 2px"><a href="{{ route('login') }}">Login</a></li>
          @endauth
        </ul>
      </nav><!-- .nav-menu -->
    </div><!-- End Header Container -->
  </div>
</header><!-- End Header -->