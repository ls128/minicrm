@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('company.index')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>

	<h1>Company Management</h1>

	@if (isset($errors) && count($errors)> 0)
	<div class="alert alert-danger">
		@foreach ($errors->all() as $error)
			<p>{{$error}}</p>
		@endforeach
	</div>
	@endif


	@if (isset($company))
	{!! Form::model($company, ['route' => ['company.update', $company->id], 'class' => 'form', 'method' => 'put']) !!}

	@else
	{!! Form::open(['route' => 'company.store', 'class' => 'form']) !!}
	
	@endif

		<div class="form-group">
			{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Name']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('logo', null, ['class' => 'form-control', 'placeholder' => 'Logo']) !!}
		</div>

		<div class="form-group">
			{!! Form::text('website', null, ['class' => 'form-control', 'placeholder' => 'Website']) !!}
		</div>

		{!! Form::submit('Submit', ['class' => 'btn btn-primary float-right']) !!}

	{!! Form::close() !!}

</div>

@endsection