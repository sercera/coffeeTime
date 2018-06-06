@extends('layout')
@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    {{--   @include('caffe.error');
       <h1>Kafići</h1>
       @if(count($caffes) > 0)
           @foreach($caffes as $caffe)
               <ul class="list-group">
                   <li class="list-group-item">Naziv: {{$caffe->name}}</li>
                   <li class="list-group-item">Adresa: {{$caffe->address}}</li>
                   <li class="list-group-item">Grad: {{$caffe->city}}</li>
                   <li class="list-group-item">Kratak opis: {{$caffe->description}}</li>
                   <li class="list-group-item">Radni sati: {{$caffe->description}}</li>
               </ul>
           @endforeach
       @endif--}}

    <div class="panel-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="bg-primary">
                <tr>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Gitlab Username</td>
                {{--    <td>Email</td>
                    <td>Role</td>
                    <td>Toggl Workspace</td>
                    <td>Toggl ID</td>
                    <td>Toggl API key</td>
                    <td>GitLab ID</td>
                    <td>GitLab Key</td>
                    <td>Actions</td>--}}
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2</td>
                        <td>3</td>
                      {{--  <td>{{$users['user_fname']}}</td>
                        <td>{{$users['user_lname']}}</td>
                        <td>{{$users['git_username']}}</td>
                        <td>{{$users['user_email']}}</td>

                        <td>{{$workspace_name[$numeration++]}}</td>
                        <td>{{$users['toggl_id']}}</td>
                        <td>{{$users['toggl_api']}}</td>
                        <td>{{$users['git_id']}}</td>
                        <td>{{$users['git_key']}}</td>
                        <td style="width: 150px;">
                            <a href="{{url('users/edit',$users['user_id'])}}"
                               class="edit btn btn-warning" role="button">Edit
                            </a>
                            <a data-toggle="modal" href="#myModal" class="btn btn-danger" id="deleteUser"
                               data-user={{$users['user_id']}}
                                       role="button">Delete
                            </a>--}}
                    </tr>


                <tbody>
            </table>
        </div>
    </div>


@endsection