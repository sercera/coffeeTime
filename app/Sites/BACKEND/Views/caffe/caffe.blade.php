@extends('layout')

@section('content')
    @include('caffe.error')

    {!! Form::open(['url' => 'caffe/submit']) !!}
    <div class="form-group">
        {{Form::label('name', 'Naziv')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naziv'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'Adresa')}}
        {{Form::text('address', '' , ['class' => 'form-control', 'placeholder' => 'Unesite adresu'])}}
    </div>
    <div class="form-group">
        {{Form::label('city', 'Grad')}}
        {{Form::text('city', '' , ['class' => 'form-control', 'placeholder' => 'Unesite grad'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Adresa')}}
        {{Form::textarea('description', '' , ['class' => 'form-control', 'placeholder' => 'Opis...'])}}
    </div>
    <div class="form-group">
        {{Form::label('work_hours', 'Radni sati')}}
        {{Form::text('work_hours', '' , ['class' => 'form-control', 'placeholder' => '12'])}}
    </div>
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection