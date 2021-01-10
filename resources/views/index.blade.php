@extends('master')

@section('content')

	<div class="col-md-4">
		
	</div>

	<div class="col-md-4">
		<br><br><br><br><br>

		
		<form action="{{ URL('login') }}" method="post">
			{{ csrf_field() }}
			<div class="form-group"> 
				<label>Email</label>
				<input type="text" name="email" class="form-control" placeholder="Email">
			</div>

			<div class="form-group"> 
				<label>Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password">
			</div>

			<div class="form-group"> 
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>

		</form>

	</div>

	<div class="col-md-4">
		
	</div>

@stop