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
            @foreach($trip as $v_trip)
              <li>
                <a href="{{ URL('user/trip/' . $v_trip->id_trip) }}">{{ $v_trip->trip }}</a>
              </li>
            @endforeach
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
    <div class="row" style="margin-top: 0px; margin-bottom: 20px;">
      <h2>About Us</h2>
      <p style="font-size: 18px; text-align: justify;line-height: 45px;">
        Alfa tour and travel adah situs pencarian paket wisata yang terpercaya. Alfa Tour and travel akan selalu memberikan pelayanan terbaik <br> dan memberikan harga termurah untuk customer. Visi kami adalah menjadi penyedia jasa tour and travel no 1 di Indonesia. <br>Alfa Tohr dan Travel menawarkan solusi untuk segala kebutuhan perjalanan dan liburan dengan harga yang kompetitif.
      </p>
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

</body>
</html>
