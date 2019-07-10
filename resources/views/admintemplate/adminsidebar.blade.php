<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ url ('admin/anasayfa') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>ANASAYFA</span>
        </a>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.kategoriekle') }}"  role="button"  >
            <i class="fas fa-fw fa-folder"></i>
            <span>KATEGORİLER</span>
        </a>

    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ url ('admin/yarismaekle') }}"  role="button"  >
            <i class="fas fa-fw fa-folder"></i>
            <span>YARIŞMALAR</span>
        </a>

    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.kampanyaekle') }}"  role="button"  >
            <i class="fas fa-fw fa-folder"></i>
            <span>KAMPANYALAR</span>
        </a>

    </li>
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('admin.kayitlikullanicilar') }}"  role="button"  >
            <i class="fas fa-fw fa-folder"></i>
            <span>KULLANICILAR</span>
        </a>

    </li>

    <li class="nav-item ">
        <a class="nav-link" href="{{ url ('admin/kullanicihesaphareketi') }}"  role="button"  >
            <i class="fas fa-fw fa-folder"></i>
            <span>KULLANICI HESAP HAREKETİ</span>
        </a>

    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ url ('admin/mesaj') }}">
            <i class="fas fa-fw fa-folder-minus"></i>
            <span>MESAJ KUTUSU</span></a>
    </li>


</ul>