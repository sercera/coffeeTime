@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    @include('caffe.error');
    <h1>Radnici</h1>
    @if(count($employees) > 0)
        @foreach($employees as $employee)
            <ul class="list-group">
                <li class="list-group-item">Username: {{$employee->username}}</li>
                <li class="list-group-item">Email: {{$employee->email}}</li>
                <li class="list-group-item">Password: {{$employee->password}}</li>
                <li class="list-group-item">Radi u: {{$employee->fk_for_caffe}}</li>
            </ul>
        @endforeach
    @endif
@endsection