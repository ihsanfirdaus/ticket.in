<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
  <div id="login_page">
    <div class="hero">
      <div class="form-box">
        <div class="button-box">
        <div id="btn"></div>
        <button class="toggle-btn" type="button" onclick="masuk()">
          Masuk
        </button>
        <button class="toggle-btn" type="button" onclick="daftar()">
          Daftar
        </button>
        </div>
        <form action="" id="masuk" class="input-group">
          <input type="text" class="input-field" placeholder="Username">
          <input type="text" class="input-field" placeholder="Password">
          <input type="checkbox" class="check-box"><span>Remember Password</span>
          <button type="submit" class="submit-btn">Masuk</button>
        </form>
        <form action="" id="daftar" class="input-group">
          <input type="text" class="input-field" placeholder="Username">
          <input type="email" class="input-field" placeholder="Email Address">
          <input type="checkbox" class="check-box"><span>I agree to the terms & conditions</span>
          <button type="submit" class="submit-btn">Daftar</button>
        </form>
      </div>
    </div>
  </div>

  <script>
    var x = document.getElementById("masuk");
    var y = document.getElementById("daftar");
    var z = document.getElementById("btn");

    function daftar(){
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";
    }

    function masuk(){
      x.style.left = "50px";
      y.style.left = "450px";
      z.style.left = "0";
    }
  </script>
</body>
</html>