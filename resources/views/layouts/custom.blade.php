<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/loading-page.css')}}">
</head>
<body>
    <div class="preloader">
        <div class="loader"></div>
    </div>
    
    <script src="{{asset('Front-end/js/jquery.min.js')}}"></script>
    <script>  
                $(window).on('load', function(){
                    setTimeout(function(){
                        $('.preloader').addClass('complete')
                    }, 3000)
                });
    </script>
</body>
</html>