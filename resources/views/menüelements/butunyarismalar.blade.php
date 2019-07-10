@extends('template.masternotslider')
@section('content')
    <div class="block-contained">
        <div>
            <a href="{{url('butunyarısmalar/artan')}}" class="btn btn-primary btn-sm" >Son Eklenen Tarihe Göre Sırala</a>
            <a href="{{url('butunyarısmalar')}}" class="btn btn-primary btn-sm" > Azalan Tarihe Göre Sırala</a>


        </div><br><br>
        <h2 class="block-title">
            BÜTÜN YARIŞMALAR
        </h2>


        @foreach($urunler as $urun)
            <div class="col-md-3">

                <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center" style="width:255px;height:325px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            {{ $urun-> urun_adi }}<em> {{ $urun-> aciklama }}</em>

                        </h4>
                    </div>
                    <div class="panel-pricing-price">
                        <img href="#" src="{{ $urun->detay->urun_resmi!=null ? asset('uploads/urunler/' . $urun->detay->urun_resmi) : 'http://via.placeholder.com/400x300?text=UrunResmi' }}">
                        <li style="color:black;text-align:center">{{ $urun-> baslangic_tarihi }} - {{ $urun-> bitis_tarihi }}</li>



                    </div>
                    <a href="{{route('urun',$urun->slug)}}" class="btn btn-primary btn-sm" >YARIŞMAYA GİT</a>
                </div>

            </div>
        @endforeach

    </div>



@endsection