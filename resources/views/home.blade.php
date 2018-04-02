@extends('layouts.app')

@section('content')
<div class="container">
	<div class="cntr">
    	<h1>Menu</h1>
	</div>
    <a href="{{route('company.index')}}" class="btn btn-outline-primary btn-block btn-lg"><span class="fas fa-building"></span> Companies list</a>
    <a href="{{route('employee.index')}}" class="btn btn-outline-primary btn-block btn-lg"><span class="fas fa-users"></span> Employees list</a>
    <a href="{{route('company.index')}}" class="btn btn-outline-primary btn-block btn-lg"><span class="fas fa-images"></span> Storage</a>
</div>

@endsection
