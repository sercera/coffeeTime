@extends('layout')

@section('content')
    @include('caffe.error');
    <h1>Radnici</h1>
    @if(count($employees) > 0)
        @foreach($employees as $employee)
            <ul class="list-group">
                <li class="list-group-item">Username: {{$employee->username}}</li>
                <li class="list-group-item">Username: {{$employee->email}}</li>
                <li class="list-group-item">Username: {{$employee->password}}</li>
                <li class="list-group-item">Username: {{$employee->fk_for_caffe}}</li>
            </ul>
        @endforeach
    @endif
@endsection