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
                <h4 class="panel-title">Menu {{$menu->name}} "{{$menu->caffe->name}}"</h4>
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
                            @if(Auth::user()->hasRole('owner')||Auth::user()->hasRole('admin'))
                            <td></td>
                            <td></td>
                                @endif
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
                                @if(Auth::user()->hasRole('owner')||Auth::user()->hasRole('admin'))

                                <td style="width: 150px;">
                                    {!! Form::open(['url' => ['menu/delete_article', $menu->menu_id, $article->article_id],'method' => 'DELETE']) !!}

                                    {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px;width:100%']) !!}

                                    {!! Form::close() !!}
                                    {{--<a href="{{url('article/edit',article['article_id'])}}"--}}
                                    {{--class="edit btn btn-warning" role="button">Izmeni</a>--}}
                                </td>
                                <td style="width: 150px;">
                                    <button class = "btn btn-warning" data-toggle="modal" data-menu_num="{{$menu->menu_id}}" data-article_num="{{$article->article_id}}" data-neto_price="{{$article->pivot->neto_price}}"
                                            data-selling_price="{{$article->pivot->selling_price}}" data-quantity="{{$article->pivot->quantity }}" data-target="#edit">Izmeni artikal</button>
                                </td>
                                    @endif
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
                @if(!empty($articles))
                @foreach($articles as $article)
                    <option value="{{$article->article_id}}"> {{$article->name}}</option>
                @endforeach
            </select>
            @endif
            {{Form::hidden('meni_id', $menu->menu_id)}}
            {{Form::label('neto_price', 'Neto cena:')}}
            {{Form::number('neto_price',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite neto cenu','required'=>'required' ])}}

            {{Form::label('selling_price', 'Prodajna cena:')}}
            {{Form::number('selling_price',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite prodajnu cenu', 'required'=>'required'])}}

            {{Form::label('quantity', 'Kolicina:')}}
            {{Form::number('quantity',  '' , ['class' => 'form-control', 'placeholder' => 'Unesite kolicinu', 'required'=>'required'])}}

            {{Form::submit('Dodajte artikal u meni',['class'=>'btn btn-primary', 'style' => 'margin-top:10px'])}}
            {!! Form::close() !!}
        </div>
    </div>






    {{--<!-- Classic Modal -->--}}
    {{--<div class="modal fade" id="{{$menu->menu_id}}" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" >&times;</button>--}}

                    {{--<h4 class="modal-title">Meni {{$menu->name}}</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body" style="height: 475px;">--}}
                    {{--<div class="well" style="margin-top:20px">--}}
                    {{--{!! Form::model(['url' => ['menu/edit_article', $menu->menu_id], 'method' => 'PUT']) !!}--}}
                    {{--<h2>Izmenite artikal </h2>--}}
                    {{--{{Form::hidden('article_num', $article->article_id)}}--}}
                    {{--{{Form::hidden('meni', $menu->menu_id)}}--}}
                    {{--{{Form::label('neto', 'Neto cena:')}}--}}
                    {{--{{Form::number('neto',  '' , ['class' => 'form-control', 'id' => 'neto_price','placeholder' => 'Unesite neto cenu'])}}--}}

                    {{--{{Form::label('selling', 'Prodajna cena:')}}--}}
                    {{--{{Form::number('selling',  '' , ['class' => 'form-control','id'=>'selling_price', 'placeholder' => 'Unesite prodajnu cenu'])}}--}}

                    {{--{{Form::label('quant', 'Kolicina:')}}--}}
                    {{--{{Form::number('quan',  '' , ['class' => 'form-control','id'=>'quantity', 'placeholder' => 'Unesite kolicinu'])}}--}}

                    {{--{{Form::submit('Sačuvaj promene',['class'=>'btn btn-primary', 'style' => 'margin-top:10px'])}}--}}
                    {{--{!! Form::close() !!}--}}

                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>--}}
                {{--</div>--}}
                    {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--</div>--}}

    <!-- Classic Modal -->
    <div class="modal fade" id="edit" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>

                    <h4 class="modal-title">Meni {{$menu->name}}</h4>
                </div>
                <div class="modal-body" style="height: 400px;">
                    <div class="well" style="margin-top:20px">
                    {!! Form::open(['url' => ['menu/update', $menu->menu_id], 'method' => 'PUT']) !!}
                    <h2>Izmenite artikal </h2>
                    {{Form::hidden('article_num', $article->article_id, ['id' => 'article_num'])}}
                    {{Form::hidden('meni', $menu->menu_id), ['id' => 'meni']}}
                    {{Form::hidden('permissions','edit' )}}
                    {{Form::label('neto_price', 'Neto cena:')}}
                    {{Form::number('neto_price',  '' , ['class' => 'form-control', 'id' => 'neto_price','placeholder' => 'Unesite neto cenu'])}}

                    {{Form::label('selling_price', 'Prodajna cena:')}}
                    {{Form::number('selling_price',  '' , ['class' => 'form-control','id'=>'selling_price', 'placeholder' => 'Unesite prodajnu cenu'])}}

                    {{Form::label('quantity', 'Kolicina:')}}
                    {{Form::number('quantity',  '' , ['class' => 'form-control','id'=>'quantity', 'placeholder' => 'Unesite kolicinu'])}}

                    {{Form::submit('Sačuvaj promene',['class'=>'btn btn-primary', 'style' => 'margin-top:10px'])}}
                    {!! Form::close() !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>

    @section('scripts')
        <script>
            $('#edit').on('show.bs.modal', function(event)
            {
                var button = $(event.relatedTarget)
                var article = button.data('article_num')
                var menu = button.data('menu_num')
                var neto = button.data('neto_price')
                var selling = button.data('selling_price')
                var quant = button.data('quantity')
                var modal = $(this)

                modal.find('.modal-body #article_num').val(article)
                modal.find('.modal-body #meni').val(menu)
                modal.find('.modal-body #neto_price').val(neto)
                modal.find('.modal-body #selling_price').val(selling)
                modal.find('.modal-body #quantity').val(quant)

            })
        </script>
    @endsection
@endsection