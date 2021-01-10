@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Kategori Fasilitas</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Kategori Fasilitas
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
                <h4 class="card-title">Daftar Data Kategori Fasilitas</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>
                      <a href="{{ URL('kategori/fasilitas/add') }}"><i class="ft-plus"></i></a>
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
                  <div class="tables">
                    <table id="example" class="table table-striped table-bordered table-hover" style="width: 100%;">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Kategori</th>
                          <th>Status</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $kategori)
                        <tr>
                          <td>{{ $kategori->id_kateg_fasilitas }}</td>
                          <td>{{ $kategori->kategori_wisata }}</td>
                          <td style="width:265px;">
                            @if($kategori->status_kateg_fasilitas == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                          </td>
                          <td>
                            <a href="{{ URL('kategori/fasilitas/edit/' . $kategori->id_kateg_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-info mr-1"><i class="ft-edit-2"></i></button>
                            </a>
                            <a href="{{ URL('kategori/fasilitas/detail/' . $kategori->id_kateg_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-warning mr-1"><i class="ft-eye"></i></button>
                            </a>
                            <a href="{{ URL('kategori/fasilitas/delete', $kategori->id_kateg_fasilitas) }}">
                              <button type="button" class="btn btn-icon btn-danger mr-1"><i class="ft-trash"></i></button>
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