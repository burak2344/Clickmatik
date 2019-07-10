@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">
        @include('mails.alert')

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KAMPANYALAR LİSTESİ</div><br>
                <div class="btn-group pull-right" role="group" aria-label="Basic example">
                    <a href="{{ route('admin.kampanyaekle.yeni')}}" class="btn btn-primary">Yeni Kampanya Ekle</a>
                </div>
               <div class="card-body">


                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>İD</th>
                                <th>Kampanya Adı</th>
                                <th>Kampanya Fiyatı</th>
                                <th>Tık Adedi</th>
                                <th>Kayıt Tarihi</th>
                                <th>Düzenle/Sil</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($list as $entry)
                            <tr>

                                <td>{{$entry->id}}</td>
                                <td>{{$entry->kampanya_adi}}</td>
                                <td>{{$entry->kampanya_fiyati}} TL</td>
                                <td>{{$entry->kampanya_tikadedi}}</td>
                                <td>{{$entry->olusturulma_tarihi}}</td>
                                <td style="width: 100px">
                                    <a href="{{route('admin.kampanyaekle.duzenle',$entry->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="Düzenle">
                                        <span class="fa fa-folder"></span>
                                    </a>
                                    <a href="{{route('admin.kampanyaekle.sil',$entry->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="Sil" onclick="return confirm('Kayıt Silinecek.Emin Misiniz?')">
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