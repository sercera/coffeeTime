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
        <li>
            <a href="{{url('caffe/edit/'.$caffe->caffe_id)}}">
                <i class="fa fa-coffee"></i>
                {{$caffe->name}}
            </a>
        <li>
            <a href="{{url('caffe/employees/'.$caffe->caffe_id)}}">
                <i class="fa fa-users"></i>
                Lista radnika kafića "{{$caffe->name}}"
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
                            <td>Ime</td>
                            <td>Prezime</td>
                            <td>Username</td>
                            <td>E-mail</td>
                            <td>Radi u</td>
                            <td>Br. telefona</td>
                            <td>ID radnika</td>
                            <td>Akcije</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($employees))
                            @foreach($employees as $employee)
                                <tr>
                                    <td>{{$employee->getDetails->first_name}}</td>
                                    <td>{{$employee->getDetails->last_name}}</td>
                                    <td>{{$employee->username}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>{{$caffe->name}}</td>
                                    <td>{{$employee->getDetails->phone_number}}</td>
                                    <td>{{empty($employee->getDetails->employee_id)?"-":$employee->getDetails->employee_id}}</td>
                                    <td style="width: 150px;">
                                        <a href="{{url('users/delete',$employee->user_id)}}" class="btn btn-danger"
                                           role="button">Izbriši
                                        </a>
                                        <a href="{{url('users/'.$employee->user_id.'/edit')}}"
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