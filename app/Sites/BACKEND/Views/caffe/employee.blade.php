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
    <div class="form-group">
        {{Form::label('fk_for_caffe', 'Izaberi kafić')}}
        <select class="form-control" name="fk_for_caffe">
            @foreach($caffes as $caffe)
                <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection