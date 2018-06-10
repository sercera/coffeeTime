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
            <a href="{{url('menu/create')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Dodaj novi meni
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista menija</h4>
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
                            <td></td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($menus) > 0)
                            @foreach($menus as $menu)
                                <tr>
                                    <td>{{$menu->caffe->name}}</td>
                                    <td style="width: 66px">
                                        {!! Form::open(['route' => ['menu.show', $menu->menu_id],'method' => 'GET']) !!}

                                        {!! Form::submit('Prikazi', ['class' => 'btn btn-warning pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                    </td>
                                    <td style="width: 66px;">
                                        {!! Form::open(['route' => ['menu.destroy', $menu->menu_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        {{--<a data-toggle="modal" href="#myModal" class="btn btn-danger" id="deleteUser"--}}
                                        {{--data-user={{$users['user_id']}}--}}
                                        {{--role="button">Izbriši</a>--}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif


                        </tbody>
                    </table>
                </div>
            </div>


@endsection