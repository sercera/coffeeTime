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
            <a href="{{url('/menu')}}">
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
                <h4 class="panel-title">Dodajte novi meni</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
    {!! Form::open(['url' => 'menu/submit']) !!}
    <div class="form-group">
        {{Form::label('fk_for_caffe', 'Izaberi kafić')}}
        <select class="form-control" name="fk_for_caffe">
            @foreach($caffes as $caffe)
                <option value="{{$caffe->caffe_id}}"> {{$caffe->name}}</option>
            @endforeach
        </select>
    </div>
<<<<<<< HEAD

=======
>>>>>>> ac39869a4d509868c57b2bd55b77aa96c1fd2890
    <div>
        {{Form::submit('Potvrdi',['class'=>'btn btn-primary'])}}
    </div>
    {!! Form::close() !!}
        </div>
    </div>

    @section('scripts')
        <script type="text/javascript">
            $('.select2-multi').select2();
        </script>
    @endsection
@endsection