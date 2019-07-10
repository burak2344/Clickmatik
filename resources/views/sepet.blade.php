@extends('template.masternotslider')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include('mails.alert')

            @if(count(Cart::content())>0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Adet Fiyatı</th>
                        <th >Adet</th>

                        <th class="text-right">Ara Toplam</th>

                    </tr>
                    @foreach(Cart::content() as $kampanyaCartItem)
                        <tr>
                            <td style="Width:120px"> <a href="{{route('kampanya',$kampanyaCartItem->name)}}" ><img src="img/bitcoin.png "  style="width:250px;height:100px"></a>
                            </td>

                            <td><a href="{{route('kampanya',$kampanyaCartItem->name)}}" >{{$kampanyaCartItem->name}}
                                </a>

                                <form action="{{route('sepet.kaldir',$kampanyaCartItem->rowId)}} " method="post" >
                                    {{csrf_field()}}
                                    {{method_field('DELETE')}}
                                    <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır" >

                                </form>





                            </td>


                            <td>{{$kampanyaCartItem->price}}</td>


                            <td>

                                <a href="#" class="btn btn-xs btn-default urun-adet-azalt" data-id="{{$kampanyaCartItem->rowId}}" data-adet="{{$kampanyaCartItem->qty-1}}">-</a>
                                <span style="padding: 10px 20px">{{$kampanyaCartItem->qty}}</span>
                                <a href="#" class="btn btn-xs btn-default urun-adet-artir" data-id="{{$kampanyaCartItem->rowId}}" data-adet="{{$kampanyaCartItem->qty+1}}">+</a>

                            </td>
                            <td class="text-right" >{{$kampanyaCartItem->subtotal}}</td>

                        </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Alt Toplam</th>
                        <th>{{Cart::subtotal()}}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">KDV</th>
                        <th>{{Cart::tax()}}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Genel Toplam</th>
                        <th>{{Cart::total()}}</th>
                    </tr>
                </table>

                <form action="{{route('sepet.bosalt')}}" method="post" >
                    {{csrf_field()}}
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-into pull-left" value="Sepeti Boşalt" >
                </form>
                <a href="{{route('odeme')}}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
            @else
                <p>Sepetinizde ürün yok</p>
            @endif


        </div>
    </div>
    @endsection


