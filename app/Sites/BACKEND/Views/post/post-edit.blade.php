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
            <a href="{{url('post')}}">
                <i class="fa fa-file-text-o"></i>
                Lista svih post-ova
            </a>
        </li>
        <li class="active">
            <a href="{{url('/post/edit/'.$post->id)}}">
                <i class="fa fa-file-text-o"></i>
                {{$post->title}}
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Izmenite post</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

            {!! Form::model($post,['route' => ['post.update' ,$post->id], 'method' => "PATCH"]) !!}
            <div class="form-group">
                {{Form::label('title', 'Naslov post-a')}}
                {{Form::text('title', $post->title , ['class' => 'form-control', 'placeholder' => 'Unesite naslov post-a','required'=>'required'])}}
            </div>
            <div class="form-group">
                {{Form::label('content', 'Sadržaj post-a')}}
                {{Form::textarea('content', $post->content , ['class' => 'form-control', 'placeholder' => 'Unesite sadržaj post-a','required'=>'required'])}}
            </div>
            <div>
                {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

@endsection