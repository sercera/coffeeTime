@extends('layout')



@section('content')
    @include('caffe.error')

    {!! Form::open(['url' => 'article/submit']) !!}
    <div class="form-group">
        {{Form::label('name', 'Naziv proizvoda')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naziv proizvoda'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Tip')}}
        {{Form::text('type', '' , ['class' => 'form-control', 'placeholder' => 'Unesite tip'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Opis proizvoda')}}
        {{Form::textarea('description', '' , ['class' => 'form-control', 'placeholder' => 'Opis proizvoda...'])}}
    </div>
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection