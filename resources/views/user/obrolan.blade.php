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
              <a href="{{ URL('user/chat') }}">
                Obrolan
              </a>
            </li>
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
        <div class="col-md-12" style="margin-left: -17px;">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Data Oborolan</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>
                      <a href="{{ URL('user/new/chat') }}">Mulai Oborolan</a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="card-content collapse show">
                <div class="card-body">
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success" style="height: 50px;">
                    <p>{{ $message }}</p>
                  </div>
                  @endif
                  <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th scope="col">Nama Pengirim</th>
                          <th scope="col">Nama Penerima</th>
                          <th scope="col">Obrolan</th>
                          <!-- <th>Status</th> -->
                          <!-- <th></th> -->
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $p=>$val)
                        <tr>
                          @if($val->status_oborolan == 1)
                            @if($val->nama_pengirim == auth()->user()->name)
                            <td><a href="{{ URL('user/add/chat' . '/' . $val->nama_penerima) }}">{{ $val->nama_pengirim }}</a></td>
                            @else
                            <td class="pesan"><a href="{{ URL('user/add/chat'. '/' . $val->nama_pengirim) }}">{{ $val->nama_pengirim }}</a></td>
                            @endif
                            <td>{{ $val->oborolan }}</td>
                          @else
                          @if($val->nama_pengirim == auth()->user()->name)
                            <td><a href="{{ URL('user/update/chat' . '/' . $val->nama_penerima) }}">{{ $val->nama_pengirim }}</a></td>
                            @else
                            <td class="pesan"><input type="hidden" name="nama" id="nama" value="{{ $val->id_oborolan }}"><a href="{{ URL('user/update/chat' . '/' . $val->id_oborolan . '/' . $val->nama_pengirim) }}" style="color: red;">{{ $val->nama_pengirim }}</a></td>
                            @endif
                            <td>{{ $val->oborolan }}</td>
                          @endif
                          <td>{{ $val->oborolan }}</td>
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
    </div>
  <!-- </div> -->
@extends('user/footer')
