@extends('layout')

@section('content')
    @include('caffe.error')

    {!! Form::open(['url' => 'table/submit']) !!}
    <div class="form-group">
        {{Form::label('number', 'Broj stola')}}
        {{Form::number('number', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj stola'])}}
    </div>
    <div class="form-group">
        {{Form::label('spots', 'Broj mesta')}}
        {{Form::number('spots', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj mesta za stolom'])}}
    </div>
    <div class="form-group">
        {{Form::label('fk_for_caffe', 'Izaberi kafić')}}
        <select class="form-control" name="fk_for_caffe">
            @foreach($caffes as $caffe)
                <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
            @endforeach
        </select>
    </div>
    <div>
        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}

@endsection