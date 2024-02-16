<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Sign in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/adminlte.min.css') }}">
</head>

<body>
  <!-- Section: Design Block -->
<section class="text-center">
  <!-- Background image -->
    <div class="p-5 bg-image" style="
    background-color: #0C4C93;    
    height: 300px;">
  </div>

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -200px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">
      <img src="{{asset('adminLTE/dist/img/2.png')}}" alt="" style="max-width: 100%; height: auto; max-height: 150px; margin-bottom: 15px;">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-5">
          <h2 class="fw-bold mb-3">Sign In</h2>

          @if(session("error"))
          <div class="card card-danger">
            <div class="card-header">
              <h3 class="card-title">{{session("error")}}</h3>
            </div>
          </div>
          @endif

          <form action="{{Route('login')}}" method="post">
            @csrf
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" value="{{ Session::get('email') }}" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-outline mb-4">
              <input type="password" value="{{ Session::get('password')}}" name="password" class="form-control" placeholder="Password" required>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">
              Sign in
            </button>

            <!-- Register buttons -->
            <p class="mb-0">Belum punya akun?
              <a href="{{Route('register')}}" class="text-center"> Daftar disini</a>
            </p>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->

<!-- jQuery -->
<script src="{{asset('adminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('adminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('adminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>