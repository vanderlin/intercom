@extends('base')

<?php 
function get_prev($key, $fd) {
	if(old($key) != null) return old($key);
	if($fd && array_key_exists($fd, $key) && $fd[$key] != null) return $fd[$key];
}
?>
@section('content')
	<div class="container" style="margin-top:100px">
		<h1>Zoltar User Maker</h1>
		<form class="form" action="/user" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="{{ get_prev('email', $fake_data) }}" placeholder="email">
			</div>

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" class="form-control" id="password" name="password" value="{{ get_prev('password', $fake_data) }}" placeholder="password">
			</div>

			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" id="firstname" name="firstname" value="{{ get_prev('firstname', $fake_data) }}" placeholder="firstname">
			</div>

			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" id="lastname" name="lastname" value="{{ get_prev('lastname', $fake_data) }}" placeholder="lastname">
			</div>

			<div class="form-group">
				<label for="dob">Date of birth</label>
				<input type="date" class="form-control" id="dob" name="dob" value="{{ get_prev('dob', $fake_data) }}" placeholder="mm/dd/yy">
			</div>

			<button type="submit" class="btn btn-default">Submit</button>

		</form>

		@if($errors->has())
			<div class="alert alert-warning" role="alert">
			@foreach ($errors->all() as $error)
				<div class="error">{{ $error }}</div>
			@endforeach
			</div>
		@endif

		<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>First Name</th> 
				<th>Last Name</th> 
				<th>Email</th> 
				<th>DOB</th>
				<th></th> 
			</tr> 
		</thead>
		<tbody>
		@foreach (Zoltar\User::all() as $user)
			<tr> 
				<th scope="row">{{$user->id}}</th>
				<td>{{$user->firstname}}</td> 
				<td>{{$user->lastname}}</td> 
				<td>{{$user->email}}</td> 
				<td>{{$user->dob}}</td>
				<td><a href={{url('/user/'.$user->id.'/show')}}>View</a></td>
			</tr>
		@endforeach
		</tbody>
		</table>
	</div>
@stop