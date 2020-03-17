{{-- 
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Ticket.in - Daftar</title>

  <!-- Custom fonts for this template-->
  <link href="{{asset('SB-Admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('SB-Admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Daftar Akun!</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Nama Pengguna" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                             <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="email" name="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" placeholder="Alamat Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                    
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar
                </button>
                <hr>
                {{-- <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> --}}
              {{-- </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div>
              <div class="text-center" style="font-size: 14px">
                Udah punya akun? Klik <a style="font-size: 14px" class="small" href="{{route('login')}}"> disini</a> untuk masuk
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{asset('SB-Admin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('SB-Admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{asset('SB-Admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{asset('SB-Admin/js/sb-admin-2.min.js')}}"></script>

</body>

</html> --}} 

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
    <script type="text/javascript" src="{{asset('form/js/main.js')}}"></script>
    <script>
      $(document).ready(function() {
        $('#password-confirm').click(function() {
          $("#hide-alert").hide();
        });
      });
    </script>
  </body>
</html>

