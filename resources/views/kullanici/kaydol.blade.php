@extends('template.masterkayıt')
@section('content')
    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet"  href="{{asset('css/registerstyle.css')}}">

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <section>
                    <h1 class="entry-title"><span>Kayıt Ol</span> </h1>
                    <hr>
                    @include('template.errors')
                    <form class="form-horizontal" method="post" name="signup" id="signup" enctype="multipart/form-data" action="{{route('kullanici.kaydol')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label class="control-label col-sm-3"for="adsoyad">İsim Soyisim <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input type="text" class="form-control" name="adsoyad" id="adsoyad" placeholder="İsim Soyisim" value="{{old('adsoyad')}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3"for="email">Email  <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email" class="form-control" name="email" id="email" placeholder=" Email " value="{{old('email')}}">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-sm-3" for="sifre">Şifre <span class="text-danger">*</span></label>
                            <div class="col-md-5 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" name="sifre" id="sifre" placeholder="Şifre Seçin (5-15 karakter)" value="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3"for="sifre-tekrari">Şifre Tekrarı <span class="text-danger">*</span></label>
                            <div class="col-md-5 col-sm-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" class="form-control" name="sifre_confirmation" id="sifre-tekrari" placeholder="Şifre Doğrulama" value="">
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Adres <span class="text-danger">*</span></label>
                            <div class="col-md-8 col-sm-9">
                                <input type="text" class="form-control" name="adres" id="adres" placeholder="Adres" value="{{old('adres')}}">
                            </div>
                        </div>






                        <div class="form-group">
                            <div class="col-xs-offset-3 col-xs-10">
                                <input name="Submit" type="submit" value="Kayıt Ol" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>

@endsection