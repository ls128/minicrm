@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('company.index')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>
	<h1><b>{{$company->name}}</b></h1>
	<p><b>Name:</b> {{$company->name}}</p>
	<p><b>Logo:</b> {{$company->logo}}</p>
	<p><b>Email</b> {{$company->email}}</p>
	<p><b>Website</b> {{$company->website}}</p>

	<hr>
		@if (isset($errors) && count($errors)> 0)
		<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
		<p>{{$error}}</p>
		@endforeach
		</div>
		@endif

		{!! Form::open(['route'=> ['company.destroy', $company->id], 'method' => 'DELETE']) !!}
		{!! Form::submit("Delete: $company->name", ['class' => 'btn btn-danger']) !!}
		{!! Form::close() !!}
</div>

@endsection