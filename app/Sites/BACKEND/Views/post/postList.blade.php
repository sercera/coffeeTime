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
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih post-ova</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Naslov post-a</td>
                            <td>Sadržaj post-a</td>
                            <td>Kafić</td>
                            <td>Akcije</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($posts) > 0)
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->content}}</td>
                                    <td>{{$post->caffe->name}}</td>

                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['post.destroy', $post->id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('post/edit',$post['id'])}}"
                                           class="edit btn btn-warning" role="button">Izmeni</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>
            </div>


@endsection