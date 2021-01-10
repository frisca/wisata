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
                <h4 class="card-title">Lihat Data Fasilitas</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        @foreach ($data as $fasilitas)
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="row">{{ $fasilitas->id_fasilitas }}</th>
                        </tr>

                        <tr>
                          <th scope="col">Kategori Fasilitas</th>
                          <td>{{ $fasilitas->kategori_wisata }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Deskripsi</th>
                          <td>{{ $fasilitas->keterangan }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Status</th>
                          <td>
                            @if($fasilitas->status_fasilitas == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <a href="{{ URl('wisata/edit/' . $wisata) }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  </a>
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