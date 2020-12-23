@extends('master')

@section('content')

	<div class="col-md-4">
		
	</div>

	<div class="col-md-4">
		<br><br><br><br><br>

		
		{!! Form::open(['route' => 'login']) !!}

		<div class="form-group"> 
			{!! Form::label('email', 'Email..') !!}
			{!! Form::text('email', null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::label('password', 'Password..') !!}
			{!! Form::password('password', ['class' => 'form-control']) !!}
		</div>

		<div class="form-group"> 
			{!! Form::submit('Submit', ['class' => 'btn btn-primary form-control']) !!}
		</div>

		{!! Form::close() !!}	

	</div>

	<div class="col-md-4">
		
	</div>

@stop