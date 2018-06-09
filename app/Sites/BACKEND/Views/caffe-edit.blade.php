@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

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
            <a href="{{url('caffe')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Dodaj novi kafić
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Izmeni kafić</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

            {!! Form::model($caffe,['route' => ['caffe.update' ,$caffe->caffe_id], 'method' => "PATCH"]) !!}
            <div class="form-group">
                {{Form::label('name', 'Naziv')}}
                {{Form::text('name', $caffe->name , ['class' => 'form-control', 'placeholder' => 'Unesite naziv'])}}
            </div>
            <div class="form-group">
                {{Form::label('address', 'Adresa')}}
                {{Form::text('address', $caffe->address , ['class' => 'form-control', 'placeholder' => 'Unesite adresu'])}}
            </div>
            <div class="form-group">
                {{Form::label('city', 'Grad')}}
                {{Form::text('city', $caffe->city , ['class' => 'form-control', 'placeholder' => 'Unesite grad'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Opis')}}
                {{Form::textarea('description', $caffe->description , ['class' => 'form-control', 'placeholder' => 'Opis...'])}}
            </div>
            <div class="form-group">
                {{Form::label('work_hours', 'Radni sati')}}
                {{Form::text('work_hours', $caffe->work_hours , ['class' => 'form-control', 'placeholder' => '12'])}}
            </div>
            <div>
                {{Form::submit('Sačuvaj',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection