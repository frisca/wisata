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
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Data Oborolan</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>
                      <a href="{{ URL('new/chat') }}">Mulai Oborolan</a>
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
                            <td><a href="{{ URL('add/chat' . '/' . $val->nama_penerima) }}">{{ $val->nama_pengirim }}</a></td>
                            @else
                            <td class="pesan"><a href="{{ URL('add/chat'. '/' . $val->nama_pengirim) }}">{{ $val->nama_pengirim }}</a></td>
                            @endif
                            <td>{{ $val->oborolan }}</td>
                          @else
                          @if($val->nama_pengirim == auth()->user()->name)
                            <td><a href="{{ URL('update/chat' . '/' . $val->nama_penerima) }}">{{ $val->nama_pengirim }}</a></td>
                            @else
                            <td class="pesan"><input type="hidden" name="nama" id="nama" value="{{ $val->id_oborolan }}"><a href="{{ URL('update/chat' . '/' . $val->id_oborolan . '/' . $val->nama_pengirim) }}" style="color: red;">{{ $val->nama_pengirim }}</a></td>
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
        <!-- Striped rows end -->
      </div>
    </div>
  </div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
@extends('footer')