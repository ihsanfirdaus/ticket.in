<!DOCTYPE html>
<html>
  <head>
    <title>Ticket.in - Daftar</title>
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
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="logo">
					  <i class="icon-airplane3 icon-3x" style="color:#fff;padding:20px"></i>
			    </div>
          <div class="input-div one">
                <div class="i">
                <i class="fa fa-user"></i>
                </div>
              <div class="div">
              <input type="text" class="input @error('name') is-invalid @enderror" name="name" required autocomplete="off" autofocus="true" placeholder="Username">
                
               @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
               @enderror
              </div>
          </div>
          <div class="input-div one">
                <div class="i">
                <i class="fa fa-mail-bulk"></i>
                </div>
              <div class="div">
              <input type="email" class="input @error('email') is-invalid @enderror" name="email" required autocomplete="off" autofocus placeholder="Email"/>

               @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
               @enderror
              </div>
          </div>
          <div class="input-div one">
                <div class="i">
                <i class="fa fa-phone"></i>
                </div>
              <div class="div">
              <input type="text" class="input @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" required autocomplete="off" autofocus="true" placeholder="Phone Number">
                
              @error('phone_number')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
              @enderror
              </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div class="div">
              <input type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password"/>
              <br>
              <br>
              <br>
              @error('password')
                <span class="invalid-feedback" role="alert" id="hide-alert">
                  <p style="color:red;display:block;">{{ $message }}</p>
                 </span>
              @enderror
            </div>
          </div>
          <div class="input-div pass">
            <div class="i">
              <i class="fa fa-lock"></i>
            </div>
            <div class="div">
              <input id="password-confirm" type="password" class="input @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"/>
            </div>
          </div>
          <input type="submit" class="btn" value="Register" />
          <a href="{{url('/login')}}" style="text-align:center">Already have an account</a>
        </form>
      </div>
    </div>
    <script src="{{asset('Front-end/js/jquery.min.js')}}"></script>
    <script src="{{asset('SB-Admin/vendor/jquery-mask/jquery.mask.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('form/js/main.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('#password-confirm').click(function() {
          $("#hide-alert").hide();
        });

        $('#phone_number').mask("0000-0000-00000");
      });
    </script>
  </body>
</html>

