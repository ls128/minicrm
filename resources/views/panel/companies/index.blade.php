@extends('layouts.app')

@section('content')

<div class="container">
	<a href="{{route('home')}}" class="btn btn-default btn-back"><span class="fas fa-arrow-left"></span> Back</a>

	<h1>Companies list</h1>

	<a href="{{route('company.create')}}" class="btn btn-default btn-new"><span class="fas fa-plus"></span> New</a>

	<table class="table table-striped">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Logo</th>
			<th>Website</th>
			<th width="90px">Action</th>
		</tr>
		@foreach($companies as $company)
		<tr>
			<td>{{$company->name}}</td>
			<td>{{$company->email}}</td>
			<td>{{$company->logo}}</td>
			<td>{{$company->website}}</td>
			<td>
				<a href="{{route('company.edit', $company->id)}}" class="action edit">
					<span class="fas fa-edit fa-lg"></span>
				</a>

				<a href="{{route('company.show', $company->id)}}" class="action show">
					<span class="fas fa-info-circle fa-lg"></span>
				</a>
			</td>
		</tr>
		@endforeach
	</table>
	{!! $companies->links() !!}
</div>

@endsection