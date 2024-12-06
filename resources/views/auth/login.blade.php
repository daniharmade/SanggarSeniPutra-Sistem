@extends('layouts.app')

@section('title', 'Login - Sanggar Seni Putra Karuhun')

@section('content')
<style>
  body {
    background: url('/kesenian2.jpeg') no-repeat center center fixed;
    background-size: cover;
  }

  .login-brand {
    font-size: 2em;
    margin-bottom: 20px;
    text-align: center;
    color: #fff; /* Optional: Change this according to your theme */
  }

  .card-primary {
    background-color: rgba(255, 255, 255, 0.9); /* Make the card background slightly transparent */
  }
</style>
<section class="section">
  <div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand" style="color: black">
          Sanggar Seni Putra Karuhun
        </div>

        <div class="card card-primary">
          <div class="card-header">
            <h4>{{ __('Login') }}</h4>
          </div>

          <div class="card-body">
            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
              @csrf
              <div class="form-group">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <label for="password" class="control-label">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>

              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                  {{ __('Login') }}
                </button>
              </div>
            </form>
            
            <div class="text-center mt-4">
              <p style="color: black">Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register</a></p>
            </div>
          </div>
        </div>

        <div class="simple-footer" style="color: black">
          Copyright &copy; Sanggar Seni Putra Karuhun @ {{ date('Y') }}
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
