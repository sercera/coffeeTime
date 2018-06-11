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
            <a href="{{url('caffe/add')}}">
                <i class="fa fa-coffee"></i>
                Dodajte novi kafić
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Dodajte novi kafić</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

    {!! Form::open(['url' => 'caffe/submit']) !!}
    <div class="form-group">
        {{Form::label('name', 'Naziv')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naziv','required'=>'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('address', 'Adresa')}}
        {{Form::text('address', '' , ['class' => 'form-control', 'placeholder' => 'Unesite adresu','required'=>'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('city', 'Grad')}}
        {{Form::text('city', '' , ['class' => 'form-control', 'placeholder' => 'Unesite grad','required'=>'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Opis')}}
        {{Form::textarea('description', '' , ['class' => 'form-control', 'placeholder' => 'Opis...','required'=>'required'])}}
    </div>
    <div class="form-group">
        {{Form::label('work_hours', 'Radni sati')}}
        {{Form::text('work_hours', '' , ['class' => 'form-control', 'placeholder' => '12','required'=>'required'])}}
    </div>
    <div>
        {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
        </div>
    </div>

@endsection