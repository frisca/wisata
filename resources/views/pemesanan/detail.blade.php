@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Pemesanan</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Pemesanan
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
                <h4 class="card-title">Lihat Data Pemesanan</h4>
              </div>
              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tbody>
                        @foreach ($data as $pemesanan)
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="row">{{ $pemesanan->id_pemesanan }}</th>
                        </tr>

                        <tr>
                          <th scope="col">Nomor Pemesanan</th>
                          <td>{{ $pemesanan->nomor_pemesanan }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Pembayaran</th>
                          <td>
                            @if($pemesanan->pembayaran == 1)
                                DP
                            @elseif($pemesanan->pembayaran == 2)
                                Lunas
                            @else

                            @endif
                          </td>
                        </tr>

                        <tr>
                          <th scope="col">Status Pembayaran</th>
                          <td>
                            @if($pemesanan->pembayaran == 1)
                                Sebagian
                            @elseif($pemesanan->pembayaran == 2)
                                Lunas
                            @else
                                Belum Bayar
                            @endif
                          </td>
                        </tr>

                        <tr>
                          <th scope="col">Total</th>
                          <td>{{ $pemesanan->total }}</td>
                        </tr>

                        <tr>
                          <th scope="col">Nama Pembeli</th>
                          <td>{{ $pemesanan->nama_pelanggan }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                  <a href="{{ URl('pemesanan') }}">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  </a>
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
                <h4 class="card-title">Daftar Data Pemesanan Detail</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="tables">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>Nama Wisata</th>
                          <th>Lokasi</th>
                          <th>Trip</th>
                          <th>Waktu</th>
                          <th>Jumlah</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($pemesanandetail as $p_detail)
                        <tr>
                          <td>{{ $p_detail->nama_wisata }}</td>
                          <td>{{ $p_detail->lokasi }}</td>
                          <td>{{ $p_detail->trip }}</td>
                          <td>{{ $p_detail->waktu }}</td>
                          <td>{{ $p_detail->jumlah }}</td>
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

      <div class="content-body">
        <!-- Striped rows start -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Data Tiket Pemesanan</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="tables">
                    <table id="example1" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>Nama Pemesanan</th>
                          <th>Wisata</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($tiketpemesanan as $t_detail)
                        <tr>
                          <td>{{ $t_detail->nama_pemesanan }}</td>
                          <td>{{ $t_detail->nama_wisata }}</td>
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