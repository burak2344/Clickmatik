@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KAMPANYA BİLGİLERİ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.kampanyaekle.kaydet', $entry->id) }}">
                            {{ csrf_field() }}

                            <h3 class="sub-header">
                                Kampanya {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
                            </h3>

                            <div class="text-md-right">
                                <button type="submit" class="btn btn-primary">
                                    {{ $entry->id > 0 ? "Güncelle" : "Kaydet" }}
                                </button>
                            </div>


                            @include('template.errors')
                            @include('mails.alert')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kampanya_adi">Kampanya Adı</label>
                                        <input type="text" class="form-control" id="kampanya_adi" name="kampanya_adi" placeholder="Kampanya Adı" value="{{ old('kampanya_adi', $entry->kampanya_adi) }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kampanya_fiyati">Kampanya Fiyatı</label>
                                        <input type="text" class="form-control" id="kampanya_fiyati" name="kampanya_fiyati" placeholder="Kampanya Fiyatı" value="{{ old('kampanya_fiyati', $entry->kampanya_fiyati) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kampanya_tikadedi">Kampanya Tık Adedi</label>
                                        <input type="text" class="form-control" id="kampanya_tikadedi" name="kampanya_tikadedi" placeholder="Kampanya Tık Adedi" value="{{ old('kampanya_tikadedi', $entry->kampanya_tikadedi) }}">
                                    </div>
                                </div>
                            </div>

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