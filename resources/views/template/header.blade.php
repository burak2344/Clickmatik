<div class="header">
    <div class="header-inner container">
        <div class="row">
            <div class="col-md-4">
                <!--navbar-branding/logo - hidden image tag & site name so things like Facebook to pick up, actual logo set via CSS for flexibility -->
                <a class="navbar-brand" href="{{ url('/') }}" >
                    <h1 class="hidden">
                        <img src="{{asset('img/clickmatik1.png')}}" >

                    </h1>
                </a>
                <div class="navbar-slogan">
                    Kendine İnan Kazanacaksın...
                </div>

            </div>
            <!--header rightside-->
            <div class="col-md-8">
                <!--user menu-->
                <ul class="list-inline user-menu pull-right">

                    </ul>
                    <ul class="list-inline user-menu pull-right">
                        @guest
                        <li class="user-register"><i class="fa fa-edit text-primary "></i> <a href="{{ route('kullanici.kaydol') }}" class="text">Kayıt Ol</a></li>
                        <li class="user-login"><i class="fa fa-sign-in text-primary"></i> <a href="{{ route('kullanici.oturumac') }}" class="text">Giriş Yap</a></li>
                        @endguest
                        @auth()

                                <li><a href="{{route('bakiye')}}">Bakiye</a></li>
                                <li><a href="{{route('kullanicibilgileri.bilgilerim')}}">{{ Auth::user()->adsoyad }}</a></li>
                                <li><a href="{{route('sepet')}}">Sepet<span class="badge badge-theme" >{{Cart::count()}}</span></a></li>
                                <li><a href="{{route('siparisler')}}">Hesap Hareketleri</a></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Çıkış</a>
                                    <form id="logout-form" action="{{route('kullanici.oturumukapat')}}" method="post" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>

                                <!--
                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Profil <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">SEPETİM</a></li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit()">Çıkış</a>
                                    <form id="logout-form" action="{{route('kullanici.oturumukapat')}}" method="post" style="display: none;">
                                        {{csrf_field()}}
                                    </form>
                                </li>
                            </ul>
                        </li>
                                -->

                            @endauth

                    </ul>


            </div>
        </div>
    </div>
</div>