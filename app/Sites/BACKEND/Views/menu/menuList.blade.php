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
            <a href="{{url('menu/')}}">
                <i class="fa fa-book"></i>
                Lista svih menija
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih menija</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Naziv kafića</td>
                            <td>Naziv menija</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($menus))
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{$menu['caffe']}}</td>
                                    <td>{{$menu['menu']->name}}</td>
                                    <td style="width: 66px">
                                        {!! Form::open(['route' => ['menu.show', $menu['menu']->menu_id],'method' => 'GET']) !!}

                                        {!! Form::submit('Prikazi', ['class' => 'btn btn-warning pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                    </td>
                                    <td style="width: 66px;">
                                        {!! Form::open(['route' => ['menu.destroy', $menu['menu']->menu_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>
            </div>


@endsection