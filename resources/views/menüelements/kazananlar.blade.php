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
                    KAZANANLAR LİSTESİ</div>

                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>

                                <th>Yarışma İD</th>
                                <th>Yarışma Adı</th>
                                <th>Kazanan İsim Soyisim</th>
                                <th>Harcadığı Tık Sayısı</th>

                            </tr>
                            </thead>

                            <tbody>
                                @foreach($sonlist as $sonlist)
                                <tr>

                                    <td>{{$sonlist->yarisma_id}}</td>
                                    <td>{{$sonlist->urun_adi}}</td>
                                    <td>{{$sonlist->adsoyad}}</td>
                                    <td>{{$sonlist->tiklanansayi}}</td>



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

