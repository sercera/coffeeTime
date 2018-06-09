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
            <a href="{{url('article')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Add new article
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Add new article</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

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

        </div>
    </div>
@endsection