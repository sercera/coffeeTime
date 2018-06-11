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
            <a href="{{url('/menu/'.$menu->menu_id)}}">
                <i class="fa fa-book"></i>
                {{$menu->caffe->name}}
            </a>
        </li>
    </ol>



    <div class="panel col-md-8">
        <div class="panel-heading">
            <div>

            </div>
            <div>
                <h4 class="panel-title">Meni {{$menu->name}} "{{$menu->caffe->name}}"</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Naziv artikla</td>
                            <td>Tip</td>
                            <td>Opis</td>
                            <td>Neto cena</td>
                            <td>Prodajna cena</td>
                            <td>Kolicina</td>
                            <td>Akcije</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($menu->article as $article)
                            <tr>
                                <td>{{$article->name}}</td>
                                <td>{{$article->type}}</td>
                                <td>{{$article->description}}</td>
                                <td>{{$article->pivot->neto_price}}</td>
                                <td>{{$article->pivot->selling_price}}</td>
                                <td>{{$article->pivot->quantity }}</td>
                                <td style="width: 150px;">
                                    {!! Form::open(['url' => ['menu/delete_article', $menu->menu_id, $article->article_id],'method' => 'DELETE']) !!}

                                    {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px;width:100%']) !!}

                                    {!! Form::close() !!}
                                    {{--<a href="{{url('article/edit',article['article_id'])}}"--}}
                                    {{--class="edit btn btn-warning" role="button">Izmeni</a>--}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="well" style="margin-top:20px">
            {!! Form::open(['url' => 'menu/add_article', 'method' => 'POST']) !!}
            <h2>Dodajte novi artikal u meni</h2>
            {{Form::label('article_number', 'Izaberite artikal:')}}
            <select class="form-control" name="article_number">
                @foreach($articles as $article)
                    <option value="{{$article->article_id}}"> {{$article->name}}</option>
                @endforeach
            </select>
            {{Form::hidden('meni_id', $menu->menu_id)}}
            {{Form::label('neto_price', 'Neto cena:')}}
            {{Form::number('neto_price',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite neto cenu'])}}

            {{Form::label('selling_price', 'Prodajna cena:')}}
            {{Form::number('selling_price',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite prodajnu cenu'])}}

            {{Form::label('quantity', 'Kolicina:')}}
            {{Form::number('quantity',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite kolicinu'])}}

            {{Form::submit('Dodajte artikal u meni',['class'=>'btn btn-primary', 'style' => 'margin-top:10px'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection