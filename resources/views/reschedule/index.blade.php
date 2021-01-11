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
                <h4 class="card-title">Daftar Data Reschedule</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Nomor Pemesanan</th>
                          <th scope="col">Total Sebelum Reschedule</th>
                          <th scope="col">Total Reschedule</th>
                          <th scope="col">Dari Tanggal Wisata</th>
                          <th scope="col">Sampai Tanggal Wisata</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($data as $reschedule)
                          <tr>
                            <td>{{ $reschedule->id_reschedule }}</td>
                            <td>{{ $reschedule->nomor_pemesanan }}</td>
                            <td>{{ $reschedule->total_sebelum }}</td>
                            <td>{{ $reschedule->total_reschedule }}</td>
                            <td>{{ $reschedule->dari_tgl_wisata }}</td>
                            <td>{{ $reschedule->sampai_tgl_wisata }}</td>
                            <td>
                              <a href="{{ URL('reschedule/detail/' . $reschedule->nomor_pemesanan) }}">
                                <button type="button" class="btn btn-icon btn-warning mr-1"><i class="ft-eye"></i></button>
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