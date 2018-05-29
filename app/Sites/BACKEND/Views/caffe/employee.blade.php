@extends('layout')

@section('content')
    @include('caffe.error')

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
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection