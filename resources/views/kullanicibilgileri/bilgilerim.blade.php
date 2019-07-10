@extends('template.masterkayıt')
@section('content')
    <link href="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
    <script src="{{asset('//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('//code.jquery.com/jquery-1.11.1.min.js')}}"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet"  href="{{asset('css/registerstyle.css')}}">

    <div id="content-wrapper">
        @include('mails.alert')

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KULLANICI LİSTESİ</div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>İD</th>
                                <th>İsim Soyisim</th>
                                <th>Email</th>
                                <th>Adres</th>
                                <th>Aktif Mi</th>
                                <th>Yönetici Mi</th>
                                <th>Kayıt Tarihi</th>
                                <th>Düzenle/Sil</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($list as $entry)
                                <tr>

                                    <td>{{$entry->id}}</td>
                                    <td>{{$entry->adsoyad}}</td>
                                    <td>{{$entry->email}}</td>
                                    <td>{{$entry->adres}}</td>


                                    <td>
                                        @if($entry->aktif_mi)
                                            <span class="label label-success">Aktif</span>
                                        @else
                                            <span class="label label-warning">Pasif</span>
                                        @endif
                                    </td>
                                    <td>@if($entry->admin_mi)
                                            <span class="label label-success">Yönetici</span>
                                        @else
                                            <span class="label label-warning">Müşteri</span>
                                        @endif</td>
                                    <td>{{$entry->olusturulma_tarihi}}</td>
                                    <td style="width: 100px">
                                        <a href="{{route('kullanicibilgileri.bilgilerim.duzenle',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                            <span class="fa fa-folder"></span>
                                        </a>
                                        <a href="{{route('kullanicibilgileri.bilgilerim.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Kayıt Silinecek.Emin Misiniz?')">
                                            <span class="fa fa-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
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
