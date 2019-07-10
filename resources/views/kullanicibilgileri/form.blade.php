@extends('template.masterkayıt')
@section('content')
    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet"  href="{{asset('css/registerstyle.css')}}">
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KULLANICI BİLGİLERİ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('kullanicibilgileri.bilgilerim.kaydet', $entry->id) }}">
                            {{ csrf_field() }}





                            @include('template.errors')
                            @include('mails.alert')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="adsoyad">İsim Soyisim</label>
                                        <input type="text" class="form-control" id="adsoyad" name="adsoyad" placeholder="Ad Soyad" value="{{ old('adsoyad', $entry->adsoyad) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email', $entry->email) }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="adres">Adres</label>
                                        <input type="text" class="form-control" id="adres" name="adres" placeholder="Adres" value="{{ old('adres', $entry->adres) }}">
                                    </div>
                                </div>
                            </div>


                            <div class="text-md-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
                                </button>
                            </div><br><br>
                        </form>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span> </span>
                </div>
            </div>
        </footer>

    </div>


@endsection