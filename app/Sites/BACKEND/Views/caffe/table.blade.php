@extends('layout')
@section('title')
    Add|Table
@endsection


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
            {!! Form::open(['url' => 'table/store']) !!}
            <div class="form-group">
                {!! Form::label('number','Broj stola',['class'=>'col-lg-1 control-label']); !!}
                <div class="col-lg-5">

                    {{Form::number('number', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj stola'])}}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('spots','Broj mesta',['class'=>'col-lg-1 control-label']); !!}
                <div class="col-lg-5">

                    {{Form::number('spots', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj mesta za stolom'])}}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('choose_caffe','Izaberi kafic',['class'=>'col-lg-1 control-label']); !!}
                <div class="col-lg-5">

                    <select class="form-control" name="fk_for_caffe">
                        @if(!empty($caffes))
                            @foreach($caffes as $caffe)
                                <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>

            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
@endsection