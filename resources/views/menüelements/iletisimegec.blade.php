@extends('template.masternotslider')
@section('content')
    <h4 class="text-uppercase">
        BİZE MESAJ GÖNDER
    </h4>
    <div class="form">

        <div id="errormessage"></div>
        <form action="{{url('/iletisimegec/yeni')}}" method="post" role="form" class="contactForm" >
            {{ csrf_field() }}
            <div class="col-md-6">
                <input type="text" name="adsoyad" class="form-control" id="adsoyad" placeholder="İsim Soyisim" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="{{ old('adsoyad', $kullanici->adsoyad) }}"/><br>
                <div class="validation"></div>
            </div>

            <div class="col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder=" Email" data-rule="email" data-msg="Please enter a valid email" value="{{ old('email', $kullanici->email) }}"/><br>
                <div class="validation"></div>
            </div>

            <div class="col-md-12">
                <input type="text" class="form-control" name="mesaj" id="mesaj" placeholder=" MESAJINIZ"  /><br>
                <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Mesaj Gönder</button></div>
        </form>
    </div>
@endsection