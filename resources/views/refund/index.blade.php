@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Refund</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Refund
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
                <h4 class="card-title">Daftar Data Refund</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  <div class="table-responsive">
                  @foreach($data as $p)
                  <table class="table" style="width: 97.5%;border:none;">
                    <tbody>
                      <input type="hidden" value="{{ $p->id_refund }}" name="id">
                      <tr>
                        <td>Nomor Pemesan</td>
                        <td><input type="text" value="{{ $p->nomor_pemesanan }}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>Nama Pemesan</td>
                        <td><input type="text" value="{{ $p->nama_pemesan }}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>Nama Paket Wisata</td>
                        <td><input type="text" value="{{ $p->nama_wisata }}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>Tanggal Pemesanan</td>
                        <td><input type="text" value="{{ $p->tgl_pemesan }}" class="form-control" disabled></td>
                      </tr>
                      <tr>
                        <td>Total Refund</td>
                        <td><input type="text" value="{{ $p->total_refund }}" class="form-control" name="hp" required></td>
                      </tr>
                      <tr>
                        <td>Status</td>
                        <td>
                        @if($p->status_approve == 1)
                          Disetujui
                        @elseif($p->status_approve == 2)
                          Ditolak
                        @elseif($p->status_approve == 0)
                          Belum Diproses
                        @endif
                        </td>
                      </tr>

                      @if($p->status_refund == 1 && $p->status_approve == 0)
                      <tr>
                        <td colspan="2">
                        <a href="{{ URL('refund/approve/' . $p->id_refund) }}">
                          <button class="btn btn-warning">Approve</button>
                        </a>
                        <a href="{{ URL('refund/reject/' . $p->id_refund) }}">
                          <button class="btn btn-danger">Reject</button>
                        </a>
                        </td>
                      </tr>
                      @endif
                    </tbody>
                  </table>
                  <br>
                  <br>
                  @endforeach
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