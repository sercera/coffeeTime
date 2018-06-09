@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection


@section('content')
    @include('caffe.error')

    <ol class="breadcrumb breadcrumb-quirk">
        <li>
            <a href="{{url('/')}}">
                <i class="glyphicon glyphicon-home"></i>
                Početna strana
            </a>
        </li>
        <li class="active">
            <a href="{{url('table')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Lista stolova
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista stolova</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Broj stola:</td>
                            <td>Broj mesta za stolom:</td>
                            <td>Kafić:</td>
                            <td>Zauzet:</td>
                            <td>Rezervisan:</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tables) > 0)
                            @foreach($tables as $table)
                                <tr>
                                    <td>{{$table->table_number}}</td>
                                    <td>{{$table->table_spots}}</td>
                                    <td>{{$table->caffe->name}}</td>
                                       <td>{{$table->is_taken}}</td>
                                    <td>{{$table->is_reserved}}</td>
                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['table.destroy', $table->table_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('table/edit',$table['table_id'])}}"
                                           class="edit btn btn-warning" role="button">Izmeni</a>
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