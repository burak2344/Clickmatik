@extends('template.masternotslider')
@section('content')
    <div class="block-contained">
        <h2 class="block-title">
            {{$kampanya->kampanya_adi}}

        </h2>
        @include('mails.alert')


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
                                <img src="{{asset('img/bitcoin.png')}} "  style="width:250px;height:100px">
                                <li><font color="#0000cd">{{$kampanya->kampanya_tikadedi}} TIK</font></li>

                            </ul>
                            <form action="{{route('sepet.ekle')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$kampanya->id}}">
                                <input type="submit" class="btn btn-primary btn-sm" value="Sepete Ekle">
                            </form>

                        </div>

                    </div>
                </div>
        </div>

@endsection

