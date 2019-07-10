<link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
<script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js')}}"></script>
<script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <!--Made with love by Mutiullah Samim -->

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet"  href="{{asset('css/loginstyle.css')}}">

    <a class="navbar-brand" href="{{ url('/') }}" >
        <h1 class="hidden">
            <img src="{{asset('img/clickmatik1.png')}}" >
        </h1>
    </a>




</head>
<body>

<div class="container">

    <div class="d-flex justify-content-center h-100">


        <div class="card" style="height: 450px;">
            @include('mails.alert')
            <div class="card-header">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span>
                    <span><i class="fab fa-twitter-square"></i></span>

                </div>
            </div>
            <div class="card-body">
                @include('template.errors')

                <form method="post" action="{{route('kullanici.oturumac')}}">
                    {{csrf_field()}}

                    <div class="input-group form-group" >
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" id="sifre" name="sifre" class="form-control" placeholder="Şifre">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox" name="benihatirla">Beni Hatırla
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Giriş" class="btn float-right login_btn">
                    </div>
                </form>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    Don't have an account?<a href="{{( route('kullanici.kaydol'))}}">Sign Up</a>
                </div>
                <div class="d-flex justify-content-center">
                    <a href="{{( url('/resetpassword'))}}">Forgot your password?</a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>