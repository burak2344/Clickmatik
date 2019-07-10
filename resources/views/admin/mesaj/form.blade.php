@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    MESAJLAR</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{route('admin.mesaj.kaydet',$entry->id)}}">
                            {{ csrf_field() }}

                            <h3 class="sub-header">
                                KULLANICI MESAJI
                            </h3>

                            <div class="text-md-right">
                                <button type="submit" class="btn btn-primary">
                                   E-MAİL OLARAK GÖNDER
                                </button>
                            </div>


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
                                        <label for="mesaj">Mesaj</label>
                                        <input type="text" class="form-control" id="mesaj" name="mesaj" placeholder="MESAJ" value="{{ old('mesaj', $entry->mesaj) }}">
                                    </div>
                                </div>
                            </div>
                            <br><br><br>
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