@extends('header')
<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-gradient-x-purple-blue" data-col="2-columns">
  @extends('nav')
  @extends('menu')
  <div class="app-content content">
    <div class="content-wrapper">
      <div class="content-wrapper-before"></div>
      <div class="content-header row">
        <div class="content-header-left col-md-4 col-12 mb-2">
          <h3 class="content-header-title">Itenerary</h3>
        </div>
        <div class="content-header-right col-md-8 col-12">
          <div class="breadcrumbs-top float-md-right">
            <div class="breadcrumb-wrapper mr-1">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <a href="{{ URL('home') }}">Beranda</a>
                </li>
                <li class="breadcrumb-item active">Itenerary
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
                <h4 class="card-title">Daftar Data Itenerary</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li>
                      <a href="{{ URL('itenerary/add') }}"><i class="ft-plus"></i></a>
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
                          <th scope="col">ID</th>
                          <th scope="col">Hari</th>
                          <th scope="col">Tujuan</th>
                          <th scope="col">Keterangan</th>
                          <th scope="col">Wisata</th>
                          <th scope="col">Status</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($data as $itenerary)
                        <tr>
                          <th scope="row">{{ $itenerary->id_itenerary }}</th>
                          <td>{{ $itenerary->hari }}</td>
                          <td>{{ $itenerary->tujuan }}</td>
                          <td>{!! html_entity_decode($itenerary->keterangan) !!}</td>
                          <td>{{ $itenerary->nama_wisata }}</td>
                          <td>
                            @if($itenerary->status_itenerary == 1)
                                Aktif
                            @else
                                Tidak Aktif
                            @endif
                          </td>
                          <td>
                            <a href="{{ URL('itenerary/edit', $itenerary->id_itenerary) }}">
                              <button type="button" class="btn btn-icon btn-info mr-1"><i class="ft-edit-2"></i></button>
                            </a>
                            <a href="{{ URL('itenerary/detail', $itenerary->id_itenerary) }}">
                              <button type="button" class="btn btn-icon btn-warning mr-1"><i class="ft-eye"></i></button>
                            </a>
                            <a href="{{ URL('itenerary/delete', $itenerary->id_itenerary) }}">
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