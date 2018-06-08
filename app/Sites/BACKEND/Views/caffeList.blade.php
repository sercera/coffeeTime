@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
       @include('caffe.error');
       <h1>Lista kafića</h1>
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
                    <td>Izmeni</td>
                    <td>Obriši</td>
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
                    </tr>
                     @endforeach
                 @endif
                {{--
                        <td style="width: 150px;">
                            <a href="{{url('users/edit',$users['user_id'])}}"
                               class="edit btn btn-warning" role="button">Edit
                            </a>
                            <a data-toggle="modal" href="#myModal" class="btn btn-danger" id="deleteUser"
                               data-user={{$users['user_id']}}
                                       role="button">Delete
                            </a>--}}

                </tbody>
            </table>
        </div>
    </div>


@endsection