<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en" >

<head>
    <meta charset="UTF-8">
    <title>CLİCKMATİK</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="{{asset('/css/tıksayfatemp/style.css')}}">
    <meta charset="utf-8">
    <style>
        input[type="button"]{
            width: 500px;
            height: 200px;
            border:none;
            font-size:3em;
            background: #FF6766;
            color:#E7E7E7;
        }
        input[type="text"]{
            width: 500px;
            height: 200px;
            border:none;
            font-size:3em;
            background: #FF6766;
            color:#E7E7E7;
        }

    </style>


</head>

<body>
<form action="{{route('tikdenetim')}}" method="post">
    {{ csrf_field() }}



    <div class="row">
        <h3 style="color: #ffffff;">Güncel Bakiye: {{$bakiye}}</h3>

    </div>
    <div class="row">
        <h1 style="color: #ffffff;">Yarışma butonu yarışma saati içerisinde aktif olacaktır.</h1>

    </div>
    <div class="row">


        <h5 style="color: white">ÖNEMLİ:::Tıkladığınız Toplam Tık Sayısını Yarışma Sonrasında Alt Kısımda Ekrana Gelencek Gönder Butonu İle Gönderiniz.<p> </p>Gönder Tuşuna Basmazsanız Yarışmanız Geçersiz Sayılacaktır </h5>

    </div><br>
    <br>
    <br>
    <div class="row" >
        @if($urun != null)
            <?php
            $now= strtotime($zaman);
            $bitis=strtotime($urun->bitis_tarihi);
            $baslangic=strtotime($urun->baslangic_tarihi);
            ?>
            @if($bitis >= $now && $baslangic <= $now)
                <input type=button onclick="arttir()" value="Buraya Tıkla" id="btn">&nbsp;

            @endif&nbsp;
            <input type=text id="sonuc" name="sonuc" for="sonuc" value="0" style="text-align: center">
            <input type=hidden id="id" name="id" for="id" value="{{$urun->id}}" >





    </div>



        @endif
        <div class="row">

            @if($bitis < $now)
                <h1 style="color: #ffffff;">Yarışma Bitmiştir</h1>
            @endif
            @if($baslangic > $now)
                <h1 style="color: #ffffff;">Yarışma Başlamamıştır</h1>
            @endif

            @if($bitis >= $now && $baslangic <= $now)
                <h1 style="color: #ffffff;">Yarışma Devam Ediyor</h1>

            @endif
        </div>


    <div><br>
        <p> <span id="goster">{{$bitis-$now}} </span> </p>
        <button class="btn btn-success btn-lg" id="gonder" hidden  type="submit"> Gönder</button>
    </div>





</form>

</body>
</html>
<script>
    function arttir(){

        var sonuc=document.getElementById("sonuc");
        sonuc.value=Number(sonuc.value)+1;
    }
    var zaman =  document.getElementById("goster").textContent;
    if(zaman > 0){
        var geriSay = setInterval(function(){
            zaman--;
            document.getElementById("goster").textContent ="Kalan "+ zaman + " Saniye";
            if(zaman <= 0){
                clearInterval(geriSay);
            }
            if (zaman  == 0) {
                $("#btn").hide(1000);
            }
            if(document.getElementById("goster").textContent == "Kalan 0 Saniye"){
                document.getElementById("gonder").removeAttribute("hidden") ;
            }
        },1000);
    }else{
        document.getElementById("goster").textContent = "Bitti";

    }




</script>






