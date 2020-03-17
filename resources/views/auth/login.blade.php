{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

<!DOCTYPE html>
<html>
  <head>
    <title>Ticket.in - Masuk</title>
    <link rel="stylesheet" href="{{asset('form/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('Front-end/css/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('icons/icomoon/styles.css')}}">
    <style>
      @font-face {
					font-family: "Roboto Consended";
					src: url("../font/RobotoCondensed-Regular.ttf");
					src: url("../font/RobotoCondensed-Regular.ttf") format("ttf"),
						url("../font/RobotoCondensed-Regular.ttf") format("truetype");

					font-display: fallback;
			}
      body{
					font-family: "Roboto Consended";
					letter-spacing: .5px;
      }
      .logo{
        background-color: #007bff;
        border-radius: 50%;
        height: 100px;
        width: 100px;
        display: inline-block;
      }
      .icon-3x{
        font-size: 58px;
      }
    </style>
   
  </head>
  <body>
    <div class="container">
      <div class="login-content">
        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="logo">
					  <i class="icon-airplane3 icon-3x" style="color:#fff;padding:20px"></i>
			    </div>
          
          <div class="input-div one">
            <div class="i">
              <i class="fa fa-mail-bulk"></i>
            </div>
            <div class="div">
              <input type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off" autofocus="true" placeholder="Email">

               @error('email')
                  <span class="invalid-feedback" role="alert" id="hide-alert">
                    <p style="color:red;display:block;margin-top:60px;">{{ $message }}</p>
                  </span>
               @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input type="password" id="password-input" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password"/>

              @error('password')
                <span class="invalid-feedback" role="alert">
                  <p style="color:red;display:block;">{{ $message }}</p>
                 </span>
              @enderror
            </div>
          </div>
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">
                    Forgot Password ?                    
            </a>
          @endif
          <input type="submit" class="btn" value="Login" />
          <a href="{{ url('/register') }}" style="text-align:center">Create an account here</a>
        </form>
      </div>
    </div>
    <script src="{{asset('Front-end/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('form/js/main.js')}}"></script>
    <script>
  
        $(document).ready(function() {
          $("#password-input").click(function() {
            $("#hide-alert").hide();
          });
        });

    </script>
  </body>
</html>
