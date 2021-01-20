@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Itenerary</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Itenerary
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
                <h4 class="card-title">Ubah Data Itenerary</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <form method="post" action="{{ URL('itenerary/change') }}">
                    {{ csrf_field() }}
                    @foreach($data as $itenerary)
                    <input type="hidden" class="form-control" name="id_itenerary" value="{{ $itenerary->id_itenerary }}">
                    <fieldset class="form-group">
                      <label>Hari</label>
                      <input type="text" class="form-control" id="hari" name="hari" value="{{ $itenerary->hari }}"
                      required>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Tujuan</label>
                      <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ $itenerary->tujuan }}"
                      required>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Deskripsi</label>
                      <textarea class="form-control" id="konten" rows="3" name="keterangan"
                      required>{!! html_entity_decode($itenerary->keterangan) !!}</textarea>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Wisata</label>
                      <select class="form-control" id="wisata" name="id_wisata" required>
                        <option value="">Pilih Wisata</option>
                        @foreach($listWisata as $wisata)
                          @if($wisata->id_wisata == $itenerary->id_wisata)
                            <option value="{{ $wisata->id_wisata }}" selected>{{ $wisata->nama_wisata }}</option>
                          @else
                            <option value="{{ $wisata->id_wisata }}">{{ $wisata->nama_wisata }}</option>
                          @endif
                        @endforeach
                      </select>
                    </fieldset>
                    <fieldset class="form-group">
                      <label>Status</label>
                      <select class="form-control" id="status_itenerary" name="status_itenerary" required>
                        <option value="">Pilih Status</option>
                        @if($itenerary->status_itenerary == 1)
                          <option value="1" selected>Aktif</option>
                          <option value="0">Tidak Aktif</option>
                        @else
                          <option value="1">Aktif</option>
                          <option value="0" selected>Tidak Aktif</option>
                        @endif
                      </select>
                    </fieldset>
                    @endforeach
                    <a href="{{ URl('itenerary') }}">
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