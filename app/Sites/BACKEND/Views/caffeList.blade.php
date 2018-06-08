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
               <a href="{{url('caffe')}}">
                   <i class="fa glyphicon glyphicon-book"></i>
                   Lista kafića
               </a>
           </li>
       </ol>
       <div class="panel">
           <div class="panel-heading">
               <div class="col-lg-5">
               </div>
               <div class="col-lg-7">
                   <h4 class="panel-title">Lista kafića</h4>
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
                    <td>Opis</td>
                    <td>Radno vreme</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @if(count($caffes) > 0)
                    @foreach($caffes as $caffe)
                    <tr>
                        <td>{{$caffe->name}}</td>
                        <td>{{$caffe->address}}</td>
                        <td>{{$caffe->city}}</td>
                        <td>{{$caffe->description}}</td>
                        <td></td>
                        <td style="width: 150px;">
                            <a href="{{url('caffe/edit',$caffe['caffe_id'])}}"
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