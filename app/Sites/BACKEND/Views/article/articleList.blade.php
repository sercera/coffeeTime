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
                Dodaj novi proizvod
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih proizvoda</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Naziv</td>
                            <td>Tip</td>
                            <td>Opis</td>
                            <td>Akcije</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($articles) > 0)
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{$article->name}}</td>
                                    <td>{{$article->type}}</td>
                                    <td>{{$article->description}}</td>
                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['article.destroy', $article->article_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('article/edit',$article['article_id'])}}"
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