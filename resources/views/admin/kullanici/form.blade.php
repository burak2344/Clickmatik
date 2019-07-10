@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KULLANICI BİLGİLERİ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.kayitlikullanicilar.kaydet', $entry->id) }}">
                            {{ csrf_field() }}

                            <h3 class="sub-header">
                                Kullanıcı {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
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
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="aktif_mi" value="0">
                                    <input type="checkbox" name="aktif_mi" value="1" {{ old('aktif_mi', $entry->aktif_mi) ? 'checked' : '' }}> Aktif
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="admin_mi" value="0">
                                    <input type="checkbox" name="admin_mi" value="1" {{ old('admin_mi', $entry->admin_mi) ? 'checked' : '' }}> Yönetici
                                </label><br><br>
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