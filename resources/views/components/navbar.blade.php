<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-flex justify-content-center align-items-center">
      <a class="nav-link h5" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    <li class="nav-item dropdown" data-toggle="dropdown" >
      <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center align-items-center">
      <div class="info font-weight-bold" style="text-transform:capitalize;">
          <a href="javascript:void(0)" class="d-block" style="color:gray !important;" id="user">Admin</a>
        </div>
        <div class="image">
          <img src="{{ empty(Auth::user()->image) ? asset('user.png'):asset('storage/profile/'.Auth::user()->image)}}" class="img-circle elevation-2" style="width:100% !important;max-width:35px !important;aspect-ratio:1 !important;object-fit:cover !important;" id="img_profile" alt="User Image">
        </div>
      </div>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a onclick="window.location.href=``" class="dropdown-item w-100">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mr-2" viewBox="0 0 16 16">
                <path d="M5 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4m4-2.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5M9 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4A.5.5 0 0 1 9 8m1 2.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5"/>
                <path d="M2 2a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2zM1 4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H8.96q.04-.245.04-.5C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 1 1 12z"/>
            </svg>  Akun
          </a>
          <div class="dropdown-divider"></div>
          <a onclick="window.location.href=`{{route('logout')}}`" class="dropdown-item w-100">
            <i class="fas fa-sign-out-alt mr-2"></i> Keluar
          </a>
        </div>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->
