@extends('layout.master_auth')

@section('content')
<div class="row">
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
      <div class="login-brand">
        <img src="{{asset('img/Lambang_Badan_Pusat_Statistik_(BPS)_Indonesia.png')}}" alt="logo" width="100" class="shadow-light ">
      </div>

      <div class="card card-primary">
        <div class="card-header">
            <h4>
                <strong> E-Data BPS 1107 / Backend</strong> 
            </h4>
         
        </div>

        <div class="card-body">
            <div class="text-center">
                <h5>
                   Login
                </h5>
            </div>

          <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
              {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email</label>
              <input id="email" type="email" class="form-control" name="email" tabindex="1" required="" autofocus="">
              <div class="invalid-feedback">
                Please fill in your email
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                <div class="float-right">
                  <a href="auth-forgot-password.html" class="text-small">
                    Forgot Password?
                  </a>
                </div>
              </div>
              <input id="password" type="password" class="form-control" name="password" tabindex="2" required="">
              <div class="invalid-feedback">
                please fill in your password
              </div>
            </div>

            <hr>

            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                Login
              </button>
            </div>
          </form>
        </div>
      </div>
      <div class="mt-5 text-muted text-center">
        Don't have an account? <a href="#">Create One</a>
      </div>
      <div class="simple-footer">
        Copyright © Stisla 2018
      </div>
    </div>
</div>
@endsection
