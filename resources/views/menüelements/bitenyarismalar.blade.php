@extends('template.masternotslider')
@section('content')
    <div class="block-contained">

        <h2 class="block-title">
            BİTEN YARIŞMALAR
        </h2>


        @foreach($aa as $a)
            <div class="col-md-3">

                <div class="panel panel-default panel-pricing panel-pricing-highlighted text-center" style="width:255px;height:325px">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            {{ $a-> urun_adi }}<em> {{ $a-> aciklama }}</em>

                        </h4>
                    </div>
                    <div class="panel-pricing-price">
                        <img href="#" src="{{ $a->detay->urun_resmi!=null ? asset('uploads/urunler/' . $a->detay->urun_resmi) : 'http://via.placeholder.com/400x300?text=UrunResmi' }}">
                        <li style="color:black;text-align:center">{{ $a-> baslangic_tarihi }} - {{ $a-> bitis_tarihi }}</li>



                    </div>
                    <a href="{{route('urun',$a->slug)}}" class="btn btn-primary btn-sm" >YARIŞMAYA GİT</a>
                </div>

            </div>
        @endforeach

    </div>

@endsection