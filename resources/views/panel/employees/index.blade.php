@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('home')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>

	<h1>Employees list</h1>

	<a href="{{route('employee.create')}}" class="btn btn-default btn-new"><span class="fas fa-plus"></span> New</a>

	<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Last Name</th>
			<th>Company</th>
			<th>Email</th>
			<th>Phone</th>
			<th width="90px">Action</th>
		</tr>
		@foreach($employees as $employee)
		<tr>
			<td>{{$employee->name}}</td>
			<td>{{$employee->lastname}}</td>
			<td>{{$employee->company}}</td>
			<td>{{$employee->email}}</td>
			<td>{{$employee->phone}}</td>
			<td>
				<a href="{{route('employee.edit', $employee->id)}}" class="action edit">
					<span class="fas fa-edit fa-lg"></span>
				</a>

				<a href="{{route('employee.show', $employee->id)}}" class="action show">
					<span class="fas fa-info-circle fa-lg"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $employees->links() !!}
</div>

@endsection