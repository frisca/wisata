<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alfa Tour & Travel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Daftar</div>
            </div>     

            <div style="padding-top:30px" class="panel-body" >
                @if($message = Session::get('success'))
                    <div id="login-alert" class="alert alert-success col-sm-12">{{ $message }}</div>
                @endif
                <form id="loginform" class="form-horizontal" role="form" action="{{ URL('daftar/store') }}" method="post">
                    {{ csrf_field() }}
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="text" class="form-control" name="name" value="" placeholder="Nama">                                        
                    </div>

                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                    </div>
                        
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                    </div>

                    <div style="margin-top:10px" class="form-group">
                        <div class="col-sm-12 controls">
                          <a href="{{ URL('/') }}">
                            <button type="button" class="btn btn-success">Kembali</button>
                          </a>
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </div>   
                </form>   
            </div>                     
        </div>  
    </div>
    </div>
</body>
</html>