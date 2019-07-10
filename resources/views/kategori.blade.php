@extends('template.master')
@section('content')
    <div class="block-contained">
        <h2 class="block-title">
            {{$kategori->kategori_adi}}
        </h2>
        @if(count($urunler)==0)
            <div class="col-md-12">Bu kategoride henüz ürün bulunmamaktadır.</div>
        @endif
        @foreach($urunler as $urun)
            <div class="col-md-3">

                <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center" style="width:255px;height:325px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            {{ $urun-> urun_adi }}<em> {{ $urun-> aciklama }}</em>

                        </h4>
                    </div>
                    <div class="panel-pricing-price">
                        <img src="{{ $urun->detay->urun_resmi!=null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x300?text=UrunResmi' }}">
                        <li style="color:black;text-align:center">{{ $urun-> baslangic_tarihi }} - {{ $urun-> bitis_tarihi }}</li>
                        <a href="{{route('urun',$urun->slug)}}" class="btn btn-primary btn-sm" >YARIŞMAYA GİT</a>


                    </div>
                </div>

            </div>
        @endforeach


    </div>
    {{$urunler->links()}}

@endsection