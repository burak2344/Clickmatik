<div class="container">
    <div class="navbar navbar-default">
        <!--mobile collapse menu button-->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <!--social media icons-->
        <div class="navbar-text social-media social-media-inline pull-right">
            <!--@todo: replace with company social media details-->
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-google-plus"></i></a>
        </div>
        <!--everything within this div is collapsed on mobile-->
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav" id="main-menu">
                <li class="icon-link">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i></a>
                </li>
                <li><a href="{{url('/kazananlar')}}">Kazananlar</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Yarışmalar<b class="caret"></b></a>
                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu">

                        <li><a href="{{url('/butunyarısmalar')}}" tabindex="-1" class="menu-item">Bütün Yarışmalar</a></li>
                        <li><a href="{{url('/bitenyarısmalar')}}" tabindex="-1" class="menu-item">Biten Yarışmalar</a></li>

                    </ul>

                </li>

                <li><a href="{{url('/misyonumuz')}}">Misyonumuz</a></li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">İletişim<b class="caret"></b></a>
                    <!-- Dropdown Menu -->
                    <ul class="dropdown-menu">
                        <li><a href="{{route('sorulansorular')}}" tabindex="-1" class="menu-item">Sıkça Sorulan Sorular</a></li>


                        <li><a href="{{route('iletisimegec')}}" tabindex="-1" class="menu-item">Bize Ulaşın</a></li>
                    </ul>

                </li>




            </ul>
        </div>
        <!--/.navbar-collapse -->
    </div>
</div>