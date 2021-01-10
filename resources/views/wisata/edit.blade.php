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
                <h4 class="card-title">Ubah Data Paket Wisata</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('wisata/change') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @foreach($data as $wisata)
                      <input type="hidden" class="form-control" name="id_wisata" value="{{ $wisata->id_wisata }}">
                      <fieldset class="form-group">
                        <label>Nama Wisata</label>
                        <input type="text" class="form-control" id="wisata" name="nama_wisata" value="{{ $wisata->nama_wisata }}">
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                        <img src="{{ asset('images/' . $wisata->image) }}" style="margin-top: 15px;width: 180px;">
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Trip</label>
                        <select class="form-control" id="trip" name="id_trip">
                          <option value="">Pilih Trip</option>
                          @foreach($trips as $trip)
                            @if($trip->id_trip == $wisata->id_trip)
                              <option value="{{ $trip->id_trip }}" selected>{{ $trip->trip }}</option>
                            @else
                              <option value="{{ $trip->id_trip }}">{{ $trip->trip }}</option>
                            @endif
                          @endforeach
                        </select>
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Lokasi</label>
                        <select class="form-control" id="lokasi" name="id_lokasi">
                          <option value="">Pilih Lokasi</option>
                          @foreach($listLokasi as $lokasi)
                            @if($trip->id_trip == $wisata->id_trip)
                              <option value="{{ $wisata->id_lokasi }}" selected>{{ $lokasi->lokasi }}</option>
                            @else
                              <option value="{{ $wisata->id_lokasi }}">{{ $lokasi->lokasi }}</option>
                            @endif
                          @endforeach
                        </select>
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Waktu</label>
                        <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $wisata->waktu }}">
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Harga</label>
                        <input type="text" class="form-control" id="harga" name="harga" value="{{ $wisata->harga }}">
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Jumlah Orang</label>
                        <input type="text" class="form-control" id="jumlah_orang" name="jumlah_orang" value="{{ $wisata->jumlah_orang }}">
                      </fieldset>
                      <fieldset class="form-group">
                        <label>Status</label>
                        <select class="form-control" id="status_wisata" name="status_wisata">
                          <option value="">Pilih Status</option>
                          @if($wisata->status_wisata == 1)
                            <option value="1" selected>Aktif</option>
                            <option value="0">Tidak Aktif</option>
                          @else
                            <option value="1">Aktif</option>
                            <option value="0" selected>Tidak Aktif</option>
                          @endif
                        </select>
                      </fieldset>
                    @endforeach
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
      <div class="content-body">
        <!-- Striped rows start -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Data Fasilitas</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>
                      <a href="{{ URL('fasilitas/' . $wisata->id_wisata. '/add') }}"><i class="ft-plus"></i></a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  @if ($message = Session::get('success1'))
                  <div class="alert alert-success" style="height: 50px;">
                    <p>{{ $message }}</p>
                  </div>
                  @endif
                  <div class="tables">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Fasilitas</th>
                          <th>Deskripsi</th>
                          <th>Tiket</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($listFasilitas as $fasilitas)
                        <tr>
                          <td>{{ $fasilitas->id_fasilitas }}</td>
                          <td>{{ $fasilitas->kategori_wisata }}</td>
                          <td>{!! html_entity_decode($fasilitas->keterangan) !!}</td>
                          <td>
                            @if($fasilitas->is_tiket == 1)
                                Ya
                            @else
                                Tidak
                            @endif
                          </td>
                          <td style="width:265px;">
                            @if($fasilitas->status_fasilitas == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                          </td>
                          <td>
                            <a href="{{ URL('fasilitas/' . $wisata->id_wisata . '/edit/' . $fasilitas->id_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-info mr-1"><i class="ft-edit-2"></i></button>
                            </a>
                            <a href="{{ URL('fasilitas/' . $wisata->id_wisata . '/detail/' . $fasilitas->id_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-warning mr-1"><i class="ft-eye"></i></button>
                            </a>
                            <a href="{{ URL('fasilitas/' . $wisata->id_wisata . '/delete', $fasilitas->id_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-danger mr-1"><i class="ft-trash"></i></button>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
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