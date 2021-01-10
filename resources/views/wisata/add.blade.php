@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Paket Wisata</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Paket Wisata
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
                <h4 class="card-title">Tambah Data Paket Wisata</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('wisata/store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset class="form-group">
                      <label>Nama Wisata</label>
                      <input type="text" class="form-control" id="wisata" name="nama_wisata">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Gambar</label>
                      <input type="file" class="form-control" id="image" name="image">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Trip</label>
                      <select class="form-control" id="trip" name="id_trip">
                        <option value="">Pilih Trip</option>
                        @foreach($trips as $trip)
                        <option value="{{ $trip->id_trip }}">{{ $trip->trip }}</option>
                        @endforeach
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Lokasi</label>
                      <select class="form-control" id="lokasi" name="id_lokasi">
                        <option value="">Pilih Lokasi</option>
                        @foreach($listLokasi as $lokasi)
                        <option value="{{ $lokasi->id_lokasi }}">{{ $lokasi->lokasi }}</option>
                        @endforeach
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Waktu</label>
                      <input type="text" class="form-control" id="waktu" name="waktu">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Harga</label>
                      <input type="text" class="form-control" id="harga" name="harga">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Jumlah Orang</label>
                      <input type="text" class="form-control" id="jumlah_orang" name="jumlah_orang">
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status_wisata" name="status_wisata">
                        <option value="">Pilih Status</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
                      </select>
                    </fieldset>
                    <a href="{{ URl('wisata') }}">
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