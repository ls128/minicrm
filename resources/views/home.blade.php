@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="text-center">
                            <div class="btn-group-vertical" role="group" aria-label="...">
                                <a href="{{route('company.index')}}" class="btn btn-outline-secondary btn-lg"><span class="fas fa-building"></span> Companies list</a>
                                <a href="{{route('employee.index')}}" class="btn btn-outline-secondary btn-lg"><span class="fas fa-users"></span> Employees list</a>
                                <a href="{{route('company.index')}}" class="btn btn-outline-secondary btn-lg"><span class="fas fa-images"></span> Storage</a>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
