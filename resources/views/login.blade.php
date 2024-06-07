<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{config('app.name')}} | Login </title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('theme/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('theme/dist/css/adminlte.min.css')}}">
    <!-- sweetalert css -->
  <link rel="stylesheet" href="{{asset('theme/alert/css/sweetalert2.css')}}">
   <!-- sweetalert js-->
  <script src="{{asset('theme/alert/js/sweetalert2.js')}}"></script>
</head>
<body class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <div class="p-2">
          <img src="{{asset('icon.jpg')}}" alt="icon"  width="50%">
        </div>
      <a href="#" class="h1" style="text-transform:uppercase;">{{config('app.name')}}</a>
    </div>
    <div class="card-body">
      <form action="{{route('login.auth')}}" method="POST">
      @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control @error('username') border border-danger @enderror" placeholder="Username" id="user" name="username">
          <div class="input-group-append">
            <div class="input-group-text" style="max-width:40px !important;">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('username')
        <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') border border-danger @enderror" placeholder="Password" id="pw" name="password">
          <div class="input-group-append">
            <div class="input-group-text" style="max-width:40px !important;">
              <!-- nah disini w kasi id -->
              <span class="fas fa-eye" id="icon-pw"></span>
            </div>
          </div>
        </div>
        @error('password')
        <div class="alert alert-danger" role="alert">
        {{ $message }}
        </div>
        @enderror
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">
                    Ingat Saya
                </label>
                </div>
            </div>
        </div>
        <div class="social-auth-links text-center mt-2 mb-3">
          <button type="submit" class="btn btn-primary btn-block font-weight-bold">Masuk</button>
        </div>
      </form>


      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('theme/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('theme/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('theme/dist/js/adminlte.min.js')}}"></script>

@session('sukses')
   <x-alert-message icon="success" title="{{ $value }}"/>
@endsession
@session('gagal')
   <x-alert-message icon="error" title="Oops..." text="{{ $value }}"/>
@endsession


<!-- yahhooo heheheh -->
<script>
  $(document).ready(function() {
    // okeh iya yoshaaaaaaa horeeee omagaaaa
    // gimana ? coba run
    // malah icon slash nya cok, pas diklik ,iya omagaaa  coba kirim di wa  okeh owlah ga bisa balik ke icon eye ?
    $("#icon-pw").click(function() {
      if($(this).attr("class") == "fas fa-eye"){
        $(this).addClass("fa-eye-slash");
        $(this).removeClass("fa-eye");
      }else{
        $(this).removeClass("fa-eye-slash");
        $(this).addClass("fa-eye");
      }
      var input = $("#pw");
      input.attr("type") === "password" ? input.attr("type", "text") : input.attr("type", "password");
    });
  });
</script>
</body>
</html>
