@extends('template.master')
@section('content')
    @include('mails.alert')
    <div id="content">
        <!-- Mission Statement -->

        <!--Showcase-->

        <!-- Services -->
        <div class="services block block-bg-gradient blockborder-bottom">
            <div class="container">
                <h2 class="block-title">
                    KATEGORILER
                </h2>


                <div class="row">
                    @foreach($kategoriler as $kategori)
                    <div class="col-md-4 text-center">
                        <div class="flip-box">
                            <div class="flip-box-inner">
                                <div class="flip-box-front">
                                    <a href=" {{route('kategori',$kategori->slug)}}">
                                        <img src="{{ $kategori->detay->kategori_resmi!=null ? asset('upload/kategoriler/' . $kategori->detay->kategori_resmi) : 'http://via.placeholder.com/400x300?text=UrunResmi' }}"></a>

                                </div>
                                <a  href=" {{route('kategori',$kategori->slug)}}">
                                <h4 class="text-weight-strong">
                                {{ $kategori->kategori_adi }}
                                </h4></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
                <!-- Pricing -->
                <div class="block-contained">
                    <h2 class="block-title">
                        ÖNE ÇIKAN YARIŞMALAR
                    </h2>
                    @foreach($urunler_one_cikan as $urun)
                    <div class="col-md-3">
                        <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center"  style="width:255px;height:325px">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    {{$urun->urun_adi}}<em> {{$urun->aciklama}}</em>

                                </h4>
                            </div>
                            <div class="panel-pricing-price">
                                <img href="#" src="{{ $urun->detay->urun_resmi!=null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x300?text=UrunResmi' }}">
                                <li>{{$urun->baslangic_tarihi}} - {{$urun->bitis_tarihi}}</li>
                            </div>
                            <a href="{{route('urun',$urun->slug)}}" class="btn btn-primary btn-sm">YARIŞMAYA GİT</a>
                         </div>

                    </div>
                        @endforeach
                </div>
                <div class="block-contained">
                    <h2 class="block-title">
                        KAMPANYALAR
                    </h2>
                    <div class="row">
                        @foreach($kampanyalar as $kampanya)
                        <div class="col-md-3">
                            <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center" style="width:255px;height:325px">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        {{$kampanya->kampanya_adi}}

                                    </h4>
                                </div>
                                <div class="panel-pricing-price">
                                    <span class="digits">{{$kampanya->kampanya_fiyati}} ₺ </span>
                                    <ul class="list-dotted" style="font-size:20px ">
                                        <img src="img/bitcoin.png "  style="width:250px;height:100px">
                                        <li><font color="#0000cd">{{$kampanya->kampanya_tikadedi}} TIK</font></li>

                                    </ul>
                                    <a href="{{route('kampanya',$kampanya->kampanya_adi)}}" class="btn btn-primary btn-sm">Sepete Ekle</a></div>

                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>


            </div>
        </div>
    </div>
    @endsection




