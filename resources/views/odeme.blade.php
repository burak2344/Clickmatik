@extends('template.masternotslider')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <form action="{{route('odemeyap')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-12">
                        <h3>Ödeme Bilgileri</h3>
                        <div class="form-group">
                            <label for="kart_numarasi">Kredi Kartı Numarası</label>
                            <input type="text" class="form-control kredikarti" id="kart_numarasi" name="kart_numarasi" style="font-size:20px;" required>
                        </div>
                        <div class="form-group">
                            <label for="son_kullanma_tarihi_ay">Son Kullanma Tarihi</label>
                            <div class="row">
                                <div class="col-md-6">
                                    Ay
                                    <select name="son_kullanma_tarihi_ay" id="son_kullanma_tarihi_ay" class="form-control" required>
                                        <option>1</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    Yıl
                                    <select  id="son_kullanma_tarihi_yil" name="son_kullanma_tarihi_yil" class="form-control" required>
                                        <option>2017</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardcvv2">CVV (Güvenlik Numarası)</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control kredikarti_cvv" name="cardcvv2" id="cardcvv2" required>
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Ön bilgilendirme formunu okudum ve kabul ediyorum.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul ediyorum.</label>
                                </div>
                            </div>
                        </form>

                    <div class="col-md-7">
                        <h4>Ödenecek Tutar</h4>
                        <span class="price">{{Cart::total()}} <small>TL</small></span>
                        <?php
                        $toplamtik=0;
                        foreach(Cart::content() as $kampanyaCartItem)

                            for( $i=1;$i<=$kampanyaCartItem->qty;$i++)
                                if($kampanyaCartItem->name=='Paket 1')
                                    $toplamtik+=250;
                                elseif($kampanyaCartItem->name=='Paket 2')
                                    $toplamtik+=750;
                                elseif($kampanyaCartItem->name=='Paket 3')
                                    $toplamtik+=2500;
                                elseif($kampanyaCartItem->name=='Paket 4')
                                    $toplamtik+=3500;

                                echo "<input type='hidden' id='toplamtik' for='toplamtik' value='$toplamtik' name='toplamtik'>"

                        ?>



                        <h4>Kullanıcı Bilgileri</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="adsoyad">Ad Soyad</label>
                                    <input type="text" class="form-control" name="adsoyad" id="adsoyad" value="{{auth()->user()->adsoyad}}" required>
                                </div>
                            </div>

                        </div>


                    </div>
                        <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
