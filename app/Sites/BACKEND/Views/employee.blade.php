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
        <li class="active">
            <a href="{{url('/employees')}}">
                <i class="fa fa-users"></i>
                Lista svih radnika
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Dodajte novog radnika</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

    {!! Form::open(['url' => 'employees/submit']) !!}
    <div class="form-group">
        {{Form::label('username', 'Username')}}
        {{Form::text('username', '' , ['class' => 'form-control', 'placeholder' => 'Unesite username'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'E-Mail')}}
        {{Form::text('email', '' , ['class' => 'form-control', 'placeholder' => 'Unesite email'])}}
    </div>
    <div class="form-group">
        {{Form::label('password', 'Password')}}
        {{Form::password('password',['class'=>'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('fk_for_caffe', 'Izaberite kafić')}}
        <select class="form-control" name="fk_for_caffe">
            @foreach($caffes as $caffe)
                <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
        </div>
    </div>
@endsection