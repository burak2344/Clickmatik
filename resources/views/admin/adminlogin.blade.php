<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CLİCKMATİK ADMİN</title>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
</head>

<body>
<div class="container">
    <form class="form-signin" action="{{route('admin.adminlogin')}}" method="post"  style="background:#2aabd2">
        {{csrf_field()}}
        <img src="{{asset('img/clickmatik1.png')}}" class="logo" >
        @include('template.errors')
        <label for="email" class="sr-only">Email </label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required autofocus><br>
        <label for="sifre" class="sr-only">Şifre</label>
        <input type="password" id="sifre" name="sifre" class="form-control" placeholder="Şifre" required ><br>
        <div class="checkbox">
            <label>
                <input type="checkbox" value="1" name="benihatirla" checked> Beni Hatırla
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Giriş Yap</button>
        <div class="links">
            <a href="{{route('anasayfa')}}">SİTEYE DÖN</a>
        </div>
    </form>
</div>
<script src='https://code.jquery.com/jquery-3.2.1.slim.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>

</body>

</html>
