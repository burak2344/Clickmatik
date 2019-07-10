@extends('template.master')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Hesap Hareketi</h2>
            @if(count($siparisler)==0)
                <p>Henüz siparişiniz yok</p>
            @else
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th>Sipariş Kodu</th>
                        <th>Tutar</th>
                        <th>Toplam Ürün</th>
                        <th></th>
                    </tr>
                    @foreach($siparisler as $siparis)
                        <tr>
                            <td>SP-{{ $siparis->id }}</td>
                            <td>{{ $siparis->siparis_tutari * ((100+config('cart.tax'))/100) }} TL</td>
                            <td>{{$siparis->sepet->sepet_kampanya_adet()}} Adet Kampanya Satın Alındı. Alınan Tık Adedi Hesabınıza Aktarıldı</td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
    @endsection