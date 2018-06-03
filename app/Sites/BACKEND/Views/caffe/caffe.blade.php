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
                Home
            </a>
        </li>
        <li class="active">
            <a href="{{url('caffe')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Add new Caffe
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Add new Caffe</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

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
        {{Form::label('description', 'Opis')}}
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
        </div>
    </div>

@endsection