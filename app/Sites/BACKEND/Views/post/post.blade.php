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
            <a href="{{url('post/add')}}">
                <i class="fa fa-file-text-o"></i>
                Dodajte novi post
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Dodajte novi post</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

            {!! Form::open(['url' => 'post/submit']) !!}
            <div class="form-group">
                {{Form::label('title', 'Naslov post-a')}}
                {{Form::text('title', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naslov post-a','required'=>'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('content', 'Sadržaj post-a')}}
                {{Form::textarea('content', '' , ['class' => 'form-control', 'placeholder' => 'Unesite sadržaj post-a','required'=>'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('fk_for_caffe', 'Izaberite kafić')}}
                <select class="form-control" name="fk_for_caffe">
                    @foreach($caffes as $caffe)
                        <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
                    @endforeach
                </select>
            </div>
            <div>
                {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection