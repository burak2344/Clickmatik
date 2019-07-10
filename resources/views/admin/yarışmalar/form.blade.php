@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    YARIŞMA BİLGİLERİ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.yarismaekle.kaydet', $entry->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <h3 class="sub-header">
                                Yarışma {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
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
                                        <label for="urun_adi">Yarışma Adı</label>
                                        <input type="text" class="form-control" id="urun_adi" name="urun_adi" placeholder="Yarışma Adı" value="{{ old('urun_adi', $entry->urun_adi) }}">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">Slug</label>
                                        <input type="hidden" name="original_slug" value="{{ old('slug', $entry->slug) }}">
                                        <input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="{{ old('slug', $entry->slug) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aciklama">Yarışma Açıklaması</label>
                                        <input type="text" class="form-control" id="aciklama" name="aciklama" placeholder="Yarışma Açıklaması" value="{{ old('aciklama', $entry->aciklama) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="baslangic_tarihi">Başlangıç Tarihi </label>
                                        <input type="text" class="form-control" id="baslangic_tarihi" name="baslangic_tarihi" placeholder="Başlangıç Tarihi" value="{{ old('baslangic_tarihi', $entry->baslangic_tarihi) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bitis_tarihi">Bitiş Tarihi</label>
                                        <input type="text" class="form-control" id="bitis_tarihi" name="bitis_tarihi" placeholder="Bitiş Tarihi" value="{{ old('bitis_tarihi', $entry->bitis_tarihi) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="checkbox">
                                <label>
                                    <input type="hidden" name="goster_one_cikan" value="0">
                                    <input type="checkbox" name="goster_one_cikan" value="1" {{ old('goster_one_cikan', $entry->detay->goster_one_cikan) ? 'checked' : '' }}> Öne Çıkan Alanında Göster
                                </label>
                            </div><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="kategoriler">Kategoriler</label>
                                        <select name="kategoriler[]" class="form-control" id="kategoriler" multiple>
                                            @foreach($kategoriler as $kategori)
                                                <option value="{{ $kategori->id }}" {{collect(old('$kategoriler',$urun_kategorileri))->contains($kategori->id) ? 'selected': ''}}>{{ $kategori->kategori_adi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div><br>

                            <div class="form-group">
                                @if($entry->detay->urun_resmi!=null)
                                    <img src="/uploads/urunler/{{$entry->detay->urun_resmi}}" style="height: 100px;margin-right: 20px;" class="thumbnail pull-left">
                                @endif

                                <label for="urun_resmi">Yarışma Resmi</label>
                                <input type="file" id="urun_resmi" name="urun_resmi">
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