@extends('layout')

@section('content')
    @include('caffe.error')

    {!! Form::open(['url' => 'table/submit']) !!}
    <div class="form-group">
        {{Form::label('number', 'Broj stola')}}
        {{Form::number('number', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj stola'])}}
    </div>
    <div class="form-group">
        {{Form::label('spots', 'Broj mesta')}}
        {{Form::number('spots', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj mesta za stolom'])}}
    </div>
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection