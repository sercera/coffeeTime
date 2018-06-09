@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

{{--@section('content')--}}
    {{--@include('caffe.error');--}}
    {{--<h1>Radnici</h1>--}}
    {{--@if(count($employees) > 0)--}}
        {{--@foreach($employees as $employee)--}}
            {{--<ul class="list-group">--}}
                {{--<li class="list-group-item">Username: {{$employee->username}}</li>--}}
                {{--<li class="list-group-item">Email: {{$employee->email}}</li>--}}
                {{--<li class="list-group-item">Password: {{$employee->password}}</li>--}}
                {{--<li class="list-group-item">Radi u: {{$employee->caffe->name}}</li>--}}
            {{--</ul>--}}
        {{--@endforeach--}}
    {{--@endif--}}
{{--@endsection--}}

@section('content')
    @include('caffe.error')

    <ol class="breadcrumb breadcrumb-quirk">
        <li>
            <a href="{{url('/')}}">
                <i class="glyphicon glyphicon-home"></i>
                Početna strana
            </a>
        </li>
        <li class="active">
            <a href="{{url('employees')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Lista radnika
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista radnika</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Username</td>
                            <td>E-mail</td>
                            <td>Password</td>
                            <td>Radi u</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($employees) > 0)
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->username}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->password}}</td>
                                    <td>{{$employee->caffe->name}}</td>
                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['employees.destroy', $employee->employee_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('employee/edit',$employee['employee_id'])}}"
                                           class="edit btn btn-warning" role="button">Izmeni</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
@endsection