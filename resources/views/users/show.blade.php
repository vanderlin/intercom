@extends('base')

<?php 
function get_prev($key, $fd) {
	if(old($key) != null) return old($key);
	if($fd && array_key_exists($fd, $key) && $fd[$key] != null) return $fd[$key];
}
?>
@section('content')
	<div class="container" style="margin-top:100px">
		<h1>{{$user->firstname}}</h1>
		<form class="form" action="/user/{{$user->id}}" method="post">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
			<div class="form-group">
				<label for="email">Email</label>
				<input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="email">
			</div>

			<div class="form-group">
				<label for="firstname">First Name</label>
				<input type="text" class="form-control" id="firstname" name="firstname" value="{{ $user->firstname }}" placeholder="firstname">
			</div>

			<div class="form-group">
				<label for="lastname">Last Name</label>
				<input type="text" class="form-control" id="lastname" name="lastname" value="{{ $user->lastname }}" placeholder="lastname">
			</div>

			<div class="form-group">
				<label for="dob">Date of birth</label>
				<input type="date" class="form-control" id="dob" name="dob" value="{{ $user->dob }}" placeholder="mm/dd/yy">
			</div>
{{-- 
			<div class="form-group">
				<label for="data">Data</label>
				<pre>
				<textarea class="form-control" name="data" id="data" cols="30" rows="10">{{$user->dataStringPretty}}</textarea>
				</pre>
			</div> --}}


			<button type="submit" class="btn btn-default">Update</button>
			<h1>Goals</h1>
			@include('users.goals', array('goals' => $user->goals))
			<pre>
				{{$user->dataStringPretty}}
			</pre>
		</form>

		@if($errors->has())
			<div class="alert alert-warning" role="alert">
			@foreach ($errors->all() as $error)
				<div class="error">{{ $error }}</div>
			@endforeach
			</div>
		@endif

	</div>
@stop