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
               <a href="{{url('/caffe')}}">
                   <i class="fa fa-coffee"></i>
                   Lista svih kafića
               </a>
           </li>
       </ol>
       <div class="panel">
           <div class="panel-heading">
               <div class="col-lg-5">
               </div>
               <div class="col-lg-7">
                   <h4 class="panel-title">Lista svih kafića</h4>
               </div>
           </div>
           <br>
           <div class="panel-body">
    <div class="panel-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="bg-primary">
                <tr>
                    <td>Ime kafića</td>
                    <td>Adresa</td>
                    <td>Grad</td>
                    <td>Radno vreme</td>
                    <td>Opis</td>
                    <td>Prikaži kafić</td>
                    <td>Lista radnika</td>
                    <td>Akcije</td>
                </tr>
                </thead>
                <tbody>
                @if(count($caffes) > 0)
                    @foreach($caffes as $caffe)
                    <tr>
                        <td>{{$caffe->name}}</td>
                        <td>{{$caffe->address}}</td>
                        <td>{{$caffe->city}}</td>
                        <td>{{$caffe->work_hour_from}}-{{$caffe->work_hour_to}}</td>
                        <td>{{$caffe->description}}</td>

                        <td style="width:75px;">
                            <a href="{{url('caffe/show',$caffe['caffe_id'])}}"
                               class="edit btn btn-info" role="button">Prikaži</a>
                        </td>
                        <td style="width: 75px;">
                            <a href="{{url('caffe/employees',$caffe['caffe_id'])}}"
                               class="edit btn btn-success" role="button">Radnici</a>
                        </td>
                        <td style="width: 150px;">

                            {!! Form::open(['route' => ['caffe.destroy', $caffe->caffe_id],'method' => 'DELETE']) !!}

                            {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                            {!! Form::close() !!}
                            <a href="{{url('caffe/edit',$caffe['caffe_id'])}}"
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