@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('employee.index')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>
	<h1><b>{{$employee->name}}</b></h1>
	<p><b>Name:</b> {{$employee->name}}</p>
	<p><b>Last name:</b> {{$employee->lastname}}</p>
	<p><b>Company:</b> {{$employee->company}}</p>
	<p><b>Email</b> {{$employee->email}}</p>
	<p><b>Phone</b> {{$employee->phone}}</p>

	<hr>
		@if (isset($errors) && count($errors)> 0)
		<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
		<p>{{$error}}</p>
		@endforeach
		</div>
		@endif

		{!! Form::open(['route'=> ['employee.destroy', $employee->id], 'method' => 'DELETE']) !!}
		{!! Form::submit("Delete: $employee->name", ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
</div>

@endsection