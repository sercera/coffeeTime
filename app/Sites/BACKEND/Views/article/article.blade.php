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
            <a href="{{url('article/add')}}">
                <i class="fa fa-beer"></i>
                Dodajte novi proizvod
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Dodajte novi proizvod</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

    {!! Form::open(['url' => 'article/submit']) !!}
    <div class="form-group">
        {{Form::label('name', 'Naziv')}}
        {{Form::text('name', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naziv proizvoda'])}}
    </div>
    <div class="form-group">
        {{Form::label('type', 'Tip')}}
        <select class="form-control" name="type">
            <option value="Voda"> Voda</option>
            <option value="Negazirano piće"> Negazirano piće</option>
            <option value="Gazirano piće"> Gazirano piće</option>
            <option value="Energetski napitci"> Energetski napitci</option>
            <option value="Čaj"> Čaj</option>
            <option value="Kafa"> Kafa</option>
            <option value="Alkoholno piće"> Alkoholno piće</option>
            <option value="Koktel"> Koktel</option>
            <option value="Kolači"> Kolači</option>
            <option value="Palačinka"> Palačinka</option>
            <option value="Pomfrit"> Pomfrit</option>
            <option value="Krilca"> Krilca</option>
            <option value="Rebarca"> Rebarca</option>
        </select>
    </div>
    <div class="form-group">
        {{Form::label('description', 'Opis')}}
        {{Form::textarea('description', '' , ['class' => 'form-control', 'placeholder' => 'Opis proizvoda...'])}}
    </div>
    <div>
        {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
        </div>
    </div>
@endsection