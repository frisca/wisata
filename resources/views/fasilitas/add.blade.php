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
                <h4 class="card-title">Tambah Data Fasilitas</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('fasilitas/store') }}">
                    {{ csrf_field() }}
                    <input type="hidden" class="form-control" id="id_wisata" name="id_wisata" value="{{ $id }}">
                    <fieldset class="form-group">
                      <label>Kategori Fasilitas</label>
                      <select class="form-control" id="id_kateg_fasilitas" name="id_kateg_fasilitas">
                        <option value="">Pilih Kategori Fasilitas</option>
                        @foreach($kategories as $kategori)
                        <option value="{{ $kategori->id_kateg_fasilitas }}">{{ $kategori->kategori_wisata }}</option>
                        @endforeach
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" id="konten" rows="3" name="keterangan"></textarea>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Menggunakan Tiket</label>
                      <select class="form-control" id="is_tiket" name="is_tiket">
                        <option value="">Pilih Tiket</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status_fasilitas" name="status_fasilitas">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                    </fieldset>
                    <a href="{{ URl('wisata/edit/' . $id) }}">
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