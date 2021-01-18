<!DOCTYPE html>
<html lang="en">
<head>
  <title>Alfa Tour & Travel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style type="text/css">
    ul {
        margin: 0px;
        padding: 0px;
    }
    .footer-section {
      background: #0000FF;
      position: relative;
    }
    .footer-cta {
      border-bottom: 0px solid #373636;
    }
    .single-cta i {
      color: #ff5e14;
      font-size: 30px;
      float: left;
      margin-top: 8px;
    }
    .cta-text {
      padding-left: 15px;
      display: inline-block;
    }
    .cta-text h4 {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 2px;
    }
    .cta-text span {
      color: #fff;
      font-size: 15px;
    }
    .footer-content {
      position: relative;
      z-index: 2;
    }
    .footer-pattern img {
      position: absolute;
      top: 0;
      left: 0;
      height: 330px;
      background-size: cover;
      background-position: 100% 100%;
    }
    .footer-logo {
      margin-bottom: 30px;
    }
    .footer-logo img {
        max-width: 200px;
    }
    .footer-text p {
      margin-bottom: 14px;
      font-size: 14px;
      color: #7e7e7e;
      line-height: 28px;
    }
    .footer-social-icon span {
      color: #fff;
      display: block;
      font-size: 20px;
      font-weight: 700;
      font-family: 'Poppins', sans-serif;
      margin-bottom: 20px;
    }
    .footer-social-icon a {
      color: #fff;
      font-size: 16px;
      margin-right: 15px;
    }
    .footer-social-icon i {
      height: 40px;
      width: 40px;
      text-align: center;
      line-height: 38px;
      border-radius: 50%;
    }
    .facebook-bg{
      background: #3B5998;
    }
    .twitter-bg{
      background: #55ACEE;
    }
    .google-bg{
      background: #DD4B39;
    }
    .footer-widget-heading h3 {
      color: #fff;
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 40px;
      position: relative;
    }
    .footer-widget-heading h3::before {
      content: "";
      position: absolute;
      left: 0;
      bottom: -15px;
      height: 2px;
      width: 50px;
      background: #ff5e14;
    }
    .footer-widget ul li {
      display: inline-block;
      float: left;
      width: 50%;
      margin-bottom: 12px;
    }
    .footer-widget ul li a:hover{
      color: #ff5e14;
    }
    .footer-widget ul li a {
      color: #878787;
      text-transform: capitalize;
    }
    .subscribe-form {
      position: relative;
      overflow: hidden;
    }
    .subscribe-form input {
      width: 100%;
      padding: 14px 28px;
      background: #2E2E2E;
      border: 1px solid #2E2E2E;
      color: #fff;
    }
    .subscribe-form button {
        position: absolute;
        right: 0;
        background: #ff5e14;
        padding: 13px 20px;
        border: 1px solid #ff5e14;
        top: 0;
    }
    .subscribe-form button i {
      color: #fff;
      font-size: 22px;
      transform: rotate(-6deg);
    }
    .copyright-area{
      background: #0000FF;
      padding: 15px 0;
    }
    .copyright-text p {
      margin: 0;
      font-size: 18px;
      color: #fff;
    }
    .copyright-text p a{
      color: #ff5e14;
    }
    .footer-menu li {
      display: inline-block;
      margin-left: 20px;
    }
    .footer-menu li:hover a{
      color: #ff5e14;
    }
    .footer-menu li a {
      font-size: 14px;
      color: #878787;
    }

    .navbar-inverse .navbar-brand {
      color: #fff;
    }

    .navbar-inverse .navbar-nav>li>a {
      color: #fff;
      font-family: serif;
      font-size: 17px;
    }
  </style>
</head>
<body style="background-color: #E6E6FA;">
<div class="container">
  <nav class="navbar navbar-inverse" style="margin-top: 10px;background-color: #0000FF; border-color: #0000FF;">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL('user/home/') }}">Alfa Tour & Travel</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{ URL('user/home') }}">Home</a></li>
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Trip <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ URL('user/trip/1') }}">One Day Trip</a>
            </li>
            <li>
              <a href="{{ URL('user/trip/2') }}">Domestic Trip</a>
            </li>
            <li>
              <a href="{{ URL('user/trip/3') }}">International Trip</a>
            </li>
          </ul>
        </li>
        <li><a href="{{ URL('user/refund' )}}">Refund</a></li>
        <li><a href="{{ URL('user/reschedule') }}">Reschedule</a></li>
        <li><a href="{{ URL('user/konfirmasi' )}}">Konfirmasi</a></li>
        <li><a href="{{ URL('user/about-us' )}}">About Us</a></li>
        <li><a href="{{ URL('user/testimoni') }}">Testimoni</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">{{ auth()->user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <a href="{{ URL('user/logout') }}">
                Logout
              </a>
            </li>
          </ul>
        </li>
        <!-- <li><a href="{{ URL('daftar') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{ URL('login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
      </ul>
    </div>
  </nav>

  <div class="container">
    <div class="row" style="margin-top: 20px; margin-bottom: 25px;">
      <table id="example" class="table table-striped table-bordered table-hover" style="width: 97.5%;">
        <thead>
          <tr>
            <th>Nomor Pemesanan</th>
            <th>Total Pembayaran</th>
            <th>Jumlah Yang Dibayar</th>
            <th>Status Pembayaran</th>
            <th>Status</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($data as $p)
          <tr>
            <td>{{ $p->nomor_pemesanan }}</td>
            <td>IDR {{ number_format($p->total, 0, '.', '.') }}</td>
            <td>IDR {{ number_format($p->jumlah_bayar, 0, '.', '.') }}</td>
            <td>
              @if($p->status_pemesanan == 0)
                Belum Bayar
              @elseif($p->status_pemesanan == 1 && $p->pembayaran == 1)
                Sudah Bayar (DP)
              @elseif(($p->status_pemesanan == 2 || $p->status_pemesanan == 3) && $p->pembayaran == 2)
                Lunas
              @endif
            </td>
            <td>
              @if($p->status_approve == 1)
                Disetujui
              @elseif($p->status_approve == 2)
                Ditolak
              @else
                Diproses
              @endif
            </td>
            <td>
              <a href="{{ URL('user/konfirmasi/detail/' . $p->nomor_pemesanan) }}">
                <button type="button" class="btn btn-warning">Detail</button>
              </a>
              @if($p->jumlah_bayar == 0)
              <a href="{{ URL('user/pembayaran/' . $p->nomor_pemesanan . '/wisata/' . $p->id_wisata) }}">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Selesaikan</button>
              @endif 
              @if($p->status_pemesanan == 0 && $p->jumlah_bayar != 0)
                <button type="button" class="btn btn-info edit" data-toggle="modal" data-target="#myModal"
                pemesananid="<?php echo $p->id_pemesanan;?>">Upload Bukti Bayar</button>
              @endif 
              @if($p->pembayaran == 2)
                @if($p->status_pemesanan == 2)
                <button type="button" class="btn btn-danger refund" data-toggle="modal" data-target="#myModalRefund"
                pemesananid="<?php echo $p->nomor_pemesanan;?>">Refund</button>
                @endif
                @if($p->status_pemesanan == 2)
                <a href="{{ URL('user/reschedule/add/' . $p->nomor_pemesanan) }}">
                  <button type="button" class="btn btn-success">Reschedule</button>
                </a>
                @endif
              @elseif($p->pembayaran == 1)
                <button type="button" class="btn btn-primary lunas" data-toggle="modal"  data-target="#myModalLunas"
                pemesananid="<?php echo $p->id_pemesanan;?>" total="<?php echo ($p->total - $p->jumlah_bayar);?>">Bayar Lunas</button>
              @endif 
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form action="{{ URL('user/konfirmasi/upload/gambar') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Upload Bukti Pembayaran</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_pemesanan" value="">
              <p>
                <input type="file" name="image" class="form-control">
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div id="myModalLunas" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form action="{{ URL('user/konfirmasi/lunas/upload/gambar') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Bayar & Upload Bukti Pembayaran Lunas</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="id_pemesanan" value="">
              <p>
                <label>Bukti Bayar</label>
                <input type="file" name="image" class="form-control">
              </p>
              <p>
                <label>Jumlah yang dibayar</label>
                <input type="text" name="total" value="" class="form-control" disabled>
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <div id="myModalRefund" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <form action="{{ URL('user/refund/add') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Refund</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="nomor_pemesanan" value="">
              <p>
                Apakah Anda ingin melakukan refund?
              </p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
              <button type="submit" class="btn btn-primary">Ya</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <footer class="footer-section">
    <div class="container">
      <div class="footer-cta pt-5 pb-5">
        <div class="row" style="margin-top: 15px;margin-bottom: 25px; ">
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-home"></i>
              <div class="cta-text">
                <h4>Office</h4>
                <span>PT. Mawardiana Berkah Sejahtera</span> <br>
                <span>Alfa Tour and Travel</span> <br>
                <span>Ciater Tengah RT 007/006</span> <br>
                <span>Kel. Ciater, Kec. Serpong</span> <br>
                <span>Tangerang Selatan</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-earphone"></i>
              <div class="cta-text">
                <h4>Phone</h4>
                <span>Whatsapp : 0812 8905 9823</span><br>
                <span>Telepon&nbsp;&nbsp;&nbsp;&nbsp; : (021) 7587 0404</span>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-4 mb-30">
            <div class="single-cta">
              <i class="glyphicon glyphicon-compressed"></i>
              <div class="cta-text">
                <h4>Diana Fitria Upik</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-content pt-5 pb-5">
        <div class="row">
          <div class="col-xl-4 col-lg-4 mb-50">
          </div>
        </div>
      </div>
      </div>
      <div class="copyright-area">
        <div class="container">
          <div class="row">
            <div class="col-xl-12 col-lg-12 text-center text-lg-center">
              <div class="copyright-text">
                <p>
                  Travel Agent Paket Wisata Indonesia dan Luar Negeri<br>Alfa Tour dan Travel
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </footer>
</div>
<script type="text/javascript">
  $(document).ready(function(){
     $('.edit').click(function(){
        var id = $(this).attr('pemesananid'); //get 
         $('input[name="id_pemesanan"]').val(id);
     });
     $('.lunas').click(function(){
        var id = $(this).attr('pemesananid'); //get 
        var total = $(this).attr('total'); //get 
        $('input[name="id_pemesanan"]').val(id);
        $('input[name="total"]').val(total);
     });
     $('.refund').click(function(){
        var nomor = $(this).attr('pemesananid');
        $('input[name="nomor_pemesanan"]').val(nomor);
     });
    });
</script>
</body>
</html>
