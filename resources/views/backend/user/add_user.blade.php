@extends('backend.layouts.app')
@section('content')
<div class="register-box">
  <div class="card card-outline card-secondary">
    <div class="card-header text-center">
    <a href="#" class="brand-link">
      <img src="{{('backend/dist/img/blood1.webp')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3 mt-1" style="opacity: .8;  width:70px">
      <span class="brand-text font-weight-700 text-danger " ><h2><b>Blood DDSS</b></h2></span>
    </a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form method="POST" action="{{ route('register') }}">
                        @csrf
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
        <input id="email" type="email"   placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email"
         value="{{ old('email') }}" required  autofocus>

@error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
@enderror
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class = "input-group mb-3">
                            <label>User Image</label>
                            <input type="file" name = "user_image" id = "user_image" class = "form-control-file @error('user_image') is-invalid @enderror " >
                            @error('user_image')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>




<div class="input-group mb-3">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
autocomplete="new-password"  placeholder="Password">

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>


<div class="input-group mb-3">
<input id="password-confirm" type="password"   placeholder="Confirm Password" class="form-control" name="password_confirmation" required autocomplete="new-password">


@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
    
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
@endsection