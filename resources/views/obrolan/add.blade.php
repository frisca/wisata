@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Obrolan</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Obrolan
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- Striped rows start -->
        <div class="card mb-3">
          <div class="card-header">
            {{ str_replace('%20',' ',$nama) }}
          </div>
          <div class="card-body">
            <input type="hidden" name="nama" id="sender" value="{{ auth()->user()->name }}">
            <div class="col-sm-6 form-group">
              <div id="demos"></div>
            </div>
            <input type="hidden" name="nama_penerima" id="receiver" value="{{ str_replace('_', '%', $namas) }}">
            <div class="col-sm-6 form-group">
              <label>Pesan</label>
              <textarea class="form-control" style="height: 100px;" name="oborolan" id="oborolan"></textarea>
            </div>
            <div class="col-sm-3">
              <button class="btn btn-primary" onclick="loadDoc()">Kirim</button> <a href="{{ URL('obrolan') }}"><button class="btn btn-success">Kembali</button></a>
            </div>
          </div>
        </div>
        <!-- Striped rows end -->
      </div>
      </form>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@extends('footer')