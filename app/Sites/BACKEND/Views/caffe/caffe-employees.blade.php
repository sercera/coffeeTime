@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    @include('error')

    <ol class="breadcrumb breadcrumb-quirk">
        <li>
            <a href="{{url('/')}}">
                <i class="glyphicon glyphicon-home"></i>
                Početna strana
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista radnika kafića "{{$caffe->name}}"</h4>
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
                            <td>Radi u</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($employees) > 0)
                            @foreach($employees as $employee)
                                @if($employee->caffe->name==$caffe->name)
                                <tr>
                                    <td>{{$employee->username}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$employee->caffe->name}}</td>
                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['employees.destroy', $employee->employee_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('employees/edit',$employee['employee_id'])}}"
                                           class="edit btn btn-warning" role="button">Izmeni</a>
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
@endsection