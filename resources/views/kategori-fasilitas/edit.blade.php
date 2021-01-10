@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Kategori Fasilitas</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Kategori Fasilitas
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
                <h4 class="card-title">Ubah Data Kategori Fasilitas</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('kategori/fasilitas/change') }}">
                    {{ csrf_field() }}
                    @foreach ($data as $kategori)
                    <input type="hidden" class="form-control" name="id_kateg_fasilitas" value="{{ $kategori->id_kateg_fasilitas }}">
                    <fieldset class="form-group">
                      <label>Kategori</label>
                      <input type="text" class="form-control" id="kategori" name="kategori_wisata" value="{{ $kategori->kategori_wisata }}">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status_kateg_fasilitas" name="status_kateg_fasilitas">
                        <option value="">Pilih Status</option>
                        @if($kategori->status_kateg_fasilitas == 1)
                          <option value="1" selected>Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        @else
                          <option value="1">Aktif</option>
                          <option value="0" selected>Tidak Aktif</option>
                        @endif
                      </select>
                    </fieldset>
                    @endforeach
                    <a href="{{ URL('kategori/fasilitas') }}">
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