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
                Home
            </a>
        </li>
        <li class="active">
            <a href="{{url('table/add')}}">
                <i class="fa glyphicon glyphicon-book"></i>
                Add new Table
            </a>
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Add new Table</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">

            {{--iz nekog razloga ne ucitava bootstrap za raspored elemenata ne mogu sad da gledam--}}
            {!! Form::model($table,['route' => ['table.update' ,$table->table_id], 'method' => "PATCH"]) !!}
            <div class="form-group">
                {!! Form::label('number','Broj stola',['class'=>'col-lg-1 control-label']); !!}
                <div class="col-lg-5">

                    {{Form::number('number', $table->table_number , ['class' => 'form-control', 'placeholder' => 'Unesite broj stola'])}}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('spots','Broj mesta',['class'=>'col-lg-1 control-label']); !!}
                <div class="col-lg-5">

                    {{Form::number('spots', $table->table_spots , ['class' => 'form-control', 'placeholder' => 'Unesite broj mesta za stolom'])}}
                </div>
            </div>
            <div class="form-group">
                {{Form::hidden('fk_for_caffe', $caffe->id, ['class' => 'form-control', 'placeholder' => 'Unesite naziv'])}}
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection