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
            <a href="{{url('table')}}">
                <i class="fa fa-circle"></i>
                Lista svih stolova
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih stolova</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="panel-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead class="bg-primary">
                        <tr>
                            <td>Broj stola</td>
                            <td>Broj mesta za stolom</td>
                            <td>Kafić</td>
                            <td>Zauzet</td>
                            <td>Rezervisan</td>
                            <td></td>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($tables) > 0)
                            @foreach($tables as $table)
                                <tr>
                                    <td>{{$table->table_number}}</td>
                                    <td>{{$table->table_spots}}</td>
                                    <td>{{$table->caffe->name}}</td>
                                    <td>
                                        @if($table->is_taken==0)
                                            Slobodan
                                        @else
                                            Zauzet
                                        @endif
                                    </td>
                                    <td>
                                        @if($table->is_reserved==0)
                                            Nije rezervisan
                                        @else
                                            Rezervisan
                                        @endif
                                    </td>
                                    <td style="width: 150px;">
                                        {!! Form::open(['route' => ['table.destroy', $table->table_id],'method' => 'DELETE']) !!}

                                        {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                        {!! Form::close() !!}
                                        <a href="{{url('table/edit',$table['table_id'])}}"
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