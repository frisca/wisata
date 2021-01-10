@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Reschedule</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Reschedule
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
                <h4 class="card-title">Lihat Data Reschedule</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        @foreach ($data as $reschedule)
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="row">{{ $reschedule->id_reschedule }}</th>
                        </tr>

                        <tr>
                          <th scope="col">Nomor Pemesanan</th>
                          <td>{{ $reschedule->nomor_pemesanan }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Total Sebelum</th>
                          <td>{{ $reschedule->total_sebelum }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Total Reschedule</th>
                          <td>{{ $reschedule->total_reschedule }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Nama Pelanggan</th>
                          <td>{{ $reschedule->nama_pelanggan }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Dari Tanggal Wisata</th>
                          <td>{{ $reschedule->dari_tgl_wisata }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Sampai Tanggal Wisata</th>
                          <td>{{ $reschedule->sampai_tgl_wisata }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Wisata</th>
                          <td>{{ $reschedule->nama_wisata }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Lokasi</th>
                          <td>{{ $reschedule->lokasi }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Trip</th>
                          <td>{{ $reschedule->trip }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Waktu</th>
                          <td>{{ $reschedule->waktu }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <a href="{{ URl('reschedule') }}">
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