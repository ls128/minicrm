@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('employee.index')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>

	<h1>Employee Management</h1>

	@if (isset($errors) && count($errors)> 0)
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
	@endif


	@if (isset($employee))
	{!! Form::model($employee, ['route' => ['employee.update', $employee->id], 'class' => 'form', 'method' => 'put']) !!}

	@else
	{!! Form::open(['route' => 'employee.store', 'class' => 'form']) !!}
	
	@endif

		<div class="form-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
		</div>

		<div class="form-group">
		{!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => 'Last name']) !!}
		</div>

		<div class="form-group">
		{!! Form::select('company', $companies, null, ['class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Phone']) !!}
		</div>

		{!! Form::submit('Submit', ['class' => 'btn btn-primary float-right']) !!}

	{!! Form::close() !!}

</div>

@endsection