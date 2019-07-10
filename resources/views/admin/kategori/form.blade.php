@extends('admintemplate.adminmaster')
@section('content')
    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    KATEGORİ BİLGİLERİ</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="post" action="{{ route('admin.kategoriekle.kaydet', $entry->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <h3 class="sub-header">
                                Kategori {{ $entry->id > 0 ? "Düzenle" : "Ekle" }}
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
                                        <label for="kategori_adi">Kategori Adı</label>
                                        <input type="text" class="form-control" id="kategori_adi" name="kategori_adi" placeholder="Kategori Adı" value="{{ old('kategori_adi', $entry->kategori_adi) }}">
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
                            <div class="form-group">
                                @if($entry->detay->kategori_resmi!=null)
                                    <img src="/upload/kategoriler/{{$entry->detay->kategori_resmi}}" style="height: 100px;margin-right: 20px;" class="thumbnail pull-left">
                                @endif
                                <label for="kategori_resmi">Kategori Resmi</label>
                                <input type="file" id="kategori_resmi" name="kategori_resmi">
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