@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Syarat & Ketentuan</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Syarat & Ketentuan
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
                <h4 class="card-title">Lihat Data Syarat & Ketentuan</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        @foreach ($data as $syarat)
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="row">{{ $syarat->id_syarat }}</th>
                        </tr>

                        <tr>
                          <th scope="col">Deskripsi</th>
                          <td>{!! html_entity_decode($syarat->keterangan) !!}</td>
                        </tr>

                        <tr>
                          <th scope="col">Wisata</th>
                          <td>{{ $syarat->nama_wisata }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Status</th>
                          <td>
                            @if($syarat->status_syarat == 1)
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
                  <a href="{{ URl('syarat') }}">
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