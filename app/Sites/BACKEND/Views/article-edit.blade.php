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
            <a href="{{url('/article/add')}}">
                <i class="fa fa-beer"></i>
                Dodajte novi proizvod
            </a>
        </li>
        <li class="active">
            <a href="{{url('article')}}">
                <i class="fa fa-beer"></i>
                Lista svih proizvoda
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Izmenite podatke o proizvodu</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

            {!! Form::model($article,['route' => ['article.update' ,$article->article_id], 'method' => "PATCH"]) !!}
            <div class="form-group">
                {{Form::label('name', 'Naziv')}}
                {{Form::text('name', $article->name , ['class' => 'form-control', 'placeholder' => 'Unesite naziv proizvoda'])}}
            </div>
            <div class="form-group">
                {{Form::label('type', 'Tip')}}
                {{Form::text('type', $article->type , ['class' => 'form-control', 'placeholder' => 'Unesite tip proizvoda'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Opis')}}
                {{Form::textarea('description', $article->description , ['class' => 'form-control', 'placeholder' => 'Opis proizvoda...'])}}
            </div>
            <div>
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection