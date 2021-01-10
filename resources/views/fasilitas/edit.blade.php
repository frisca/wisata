@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Fasilitas</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Fasilitas
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Striped rows start -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Ubah Data Fasilitas</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('fasilitas/change') }}">
                    {{ csrf_field() }}
                    @foreach ($data as $fasilitas)
                    <input type="hidden" class="form-control" id="id_wisata" name="id_wisata" value="{{ $fasilitas->id_wisata }}">
                    <input type="hidden" class="form-control" id="id_fasilitas" name="id_fasilitas" value="{{ $fasilitas->id_fasilitas }}">
                    <fieldset class="form-group">
                      <label>Kategori Fasilitas</label>
                      <select class="form-control" id="id_kateg_fasilitas" name="id_kateg_fasilitas">
                        <option value="">Pilih Kategori Fasilitas</option>
                        @foreach($kategories as $kategori)
                          @if($fasilitas->id_kateg_fasilitas == $kategori->id_kateg_fasilitas)
                            <option value="{{ $kategori->id_kateg_fasilitas }}" selected>{{ $kategori->kategori_wisata }}</option>
                          @else
                            <option value="{{ $kategori->id_kateg_fasilitas }}">{{ $kategori->kategori_wisata }}</option>
                          @endif
                        @endforeach
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" id="konten" rows="3" name="keterangan">{!! html_entity_decode($fasilitas->keterangan) !!}</textarea>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Menggunakan Tiket</label>
                      <select class="form-control" id="is_tiket" name="is_tiket">
                        <option value="">Pilih Tiket</option>
                        @if($fasilitas->is_tiket == 1)
                          <option value="1" selected>Ya</option>
                          <option value="0">Tidak</option>
                        @else
                          <option value="1">Ya</option>
                          <option value="0" selected>Tidak</option>
                        @endif
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status_fasilitas" name="status_fasilitas">
                        <option value="">Pilih Status</option>
                        @if($fasilitas->status_fasilitas == 1)
                          <option value="1" selected>Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        @else
                          <option value="1">Aktif</option>
                          <option value="0" selected>Tidak Aktif</option>
                        @endif                      
                      </select>
                    </fieldset>
                    @endforeach
                    <a href="{{ URl('wisata/edit/' . $wisata) }}">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    </a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Striped rows end -->
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@extends('footer')