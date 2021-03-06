@extends('master')

@section('content')
<div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
        <div class="panel-heading">
            <div class="panel-title">Silahkan Masuk</div>
        </div>     

        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
	        <form id="loginform" class="form-horizontal" role="form" action="{{ URL('admin/process/login') }}" method="post">
	            {{ csrf_field() }}
	            <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="login-username" type="text" class="form-control" name="email" value="" placeholder="Email">                                        
                </div>
	                
	            <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div style="margin-top:10px" class="form-group">
                    <!-- Button -->
                    <div class="col-sm-12 controls">
                      <button type="submit" class="btn btn-primary">Masuk</button>
                    </div>
                </div>   
	        </form>   
        </div>                     
    </div>  
</div>
@stop