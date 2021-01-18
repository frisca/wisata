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
        <form method="post" action="{{ URL('obrolan/store/' . $id . '/' . $id1) }}">
        <!-- Striped rows start -->
        <div class="card mb-3">
                <div class="card-header">
                    @foreach (array($data) as $p=>$o)
                        @foreach($users as $k)
                            @if($k->id == $o['nama_pengirim'])
                                {{ str_replace('%20',' ',$k->name) }}
                            @endif
                        @endforeach
                    @endforeach
                </div>
              <div class="card-body">
                @foreach (array($data) as $p=>$o)
                    @foreach($users as $k)
                        @if($k->id == $o['nama_pengirim'])
                            <input type="hidden" name="sender" id="sender" value="{{ $k->id}}">
                        @endif
                    @endforeach
                @endforeach
               <div class="col-sm-6 form-group">
                    <div style="text-align:left;">
                    @foreach (array($data) as $p=>$o)
                            @foreach($users as $k)
                                @if(($k->id == $o['nama_pengirim']) && ($k->id == auth()->user()->id))
                                    <b>{{ str_replace('%20',' ',$k->name) }}</b><br>
                                    <span>{{ $o['obrolan'] }}</span>
                                @endif
                            @endforeach
                            
                    @endforeach
                    </div>

                    <div style="text-align:right;">
                    @foreach (array($data) as $p=>$o)
                            @foreach($users as $k)
                                @if($k->id == $o['nama_penerima'] && ($k->id != auth()->user()->id))
                                    <b>{{ str_replace('%20',' ',$k->name) }}</b><br>
                                    <span>{{ $o['obrolan'] }}</span>
                                @endif
                            @endforeach
                            
                    @endforeach
                    </div>
               </div>
               @foreach (array($data) as $p=>$o)
                    @foreach($users as $k)
                        @if($k->id == $o['nama_penerima'])
                            <input type="hidden" name="receiver" id="receiver" value="{{$k->id}}">
                        @endif
                    @endforeach
               @endforeach
               <div class="col-sm-6 form-group">
                 <label>Pesan</label>
                 <textarea class="form-control" style="height: 100px;" name="msg" id="msg"></textarea>
               </div>
               <div class="col-sm-3">
                 <button class="btn btn-primary" type="submit">Kirim</button> <a href="{{ URL('obrolan') }}"><button class="btn btn-success">Kembali</button></a>
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