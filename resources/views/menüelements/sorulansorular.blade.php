@extends('template.masternotslider')
@section('content')
    <link href="{{asset('maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>

    <link href="{{asset('css/sorulansorular.css')}}" rel="stylesheet">

    <!------ Include the above in your HEAD tag ---------->

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Material Bootstrap Wizard by Creative Tim</title>

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    </head>
    <body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center wow zoomIn">
                    <h1>SIKÇA SORULAN SORULAR</h1>
                    <span></span>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Tık nedir?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <p>Yarışmamızda kullanılan sanal para olarak nitelendirebiliriz.</p>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Nasıl tık satın alabilirim?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                                <li>Clickmatik.com üyeliğinize giriş yapın.</li>
                                <li>Anasayfa da bulunan kampanyalar kısmından istediğiniz kampanyayı seçin ve sepete ekleyin.</li>
                                <li>Ödeme işlemini gerçekleştirdikten sonra satın aldığınız tık adeti hesabınıza yansıyacaktır.</li>
                                <li>Hesap hareketleri kısmında son satın aldığınız tık miktarını görebilirsiniz.</li>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Yarışmaya nasıl katılabilirim?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                                <li>Clickmatik.com üyeliğinize giriş yapın.</li>
                                <li>İsterseniz anasayfa bulunan yarışmaya hızlı katıl yada kategoriler içerisin de istediğiniz yarışmaya katıl butonu ile katılabilirsiniz.</li>
                                <li>Karşınızda ki ekranda ki belirlenen yere tıklayarak yarışmayı bitirebilirsiniz.</li>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Yarışmayı kazanırsam kazandığım ürün elime ne zaman ulaşır?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                                <li>Yarışmanın bitimi ardından üç iş günü içinde yarışma kazandığınız ürün kargoya verilecektir.</li>
                                <li>Ulaşmadığı taktirde iletişime geçebilirsiniz.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--- END COL -->
        </div><!--- END ROW -->
    </div>
    </body>
    </html>

 @endsection
