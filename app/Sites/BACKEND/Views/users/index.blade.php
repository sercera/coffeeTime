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
            <a href="{{url('users')}}">
                <i class="fa fa-users"></i>
                Lista svih korisnika

            </a>
        </li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih radnika</h4>
            </div>
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead class="bg-primary">
                    <tr>
                        <td>Ime</td>
                        <td>Prezime</td>
                        <td>Korisnicko ime</td>
                        <td>Email</td>
                        <td>Br. licne karte</td>
                        <td>Godine</td>
                        <td >Adresa stanovanja</td>
                        <td>Pol</td>
                        <td>Rola</td>
                        <td>Kafic</td>
                        <td>Akcije</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user['username']}}</td>
                            <td>{{$user['email']}}</td>

                            @if((is_null($user['userDetails'])))
                                <td >-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>

                                @else
                                <td>{{$user['userDetails']->first_name}}</td>
                                <td>{{$user['userDetails']->last_name}}</td>
                            <td >{{$user['userDetails']->pid}}</td>
                            <td>{{$user['userDetails']->age}}</td>
                            <td>{{$user['userDetails']->address}}</td>
                            <td>{{$user['userDetails']->gender}}</td>
                            @endif
                            <td>{{$user['role']}}</td>
                            <td>{{empty($user['caffe'])?"/":$user['caffe']}}</td>
                            <td style="width: 150px;">
                                <a  href="{{url('users/delete',$user['user_id'])}}" class="btn btn-danger"
                                    role="button">Izbriši
                                </a>

                                <a href="{{url('users/'.$user['user_id']).'/edit'}}"
                                   class="edit btn btn-warning" role="button">Izmeni
                                </a>

                        </tr>

                    @endforeach

                    <tbody>
                </table>
            </div>
        </div>



    </div>

    @endsection
