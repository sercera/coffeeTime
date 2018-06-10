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
            <a href="{{url('users/'.$user->user_id.'/edit')}}">
                <i class="fa fa-user-plus"></i>
                {{$userDetails->first_name}} {{$userDetails->last_name}}
            </a>
        </li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title" style="margin-left: 40%;">Edituj korsinika: {{$userDetails->first_name}} {{$userDetails->last_name}}</h4>
            </div>
        </div>
        <div class="panel-body" style="margin-left: 20px">
            <div class="row">

                {!! Form::open(['url'=>['users',$user->user_id],'method'=>'PUT','class' =>'form-horizontal']); !!}

                <div class="form-group">

                    {!! Form::label('first_name','Ime:'); !!}

                    @if($errors->has('first_name'))

                        {!! Form::text('first_name',Input::old('first_name'),['class'=>'form-control has-error','placeholder'=>'Unesi svoje ime','required'=>'required']); !!}

                        @foreach($errors->get('first_name') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('first_name',$userDetails->first_name,['class'=>'form-control','placeholder'=>'Unesi svoje ime','required'=>'required']); !!}
                    @endif
                </div>

                <div class="form-group ">
                    {!! Form::label('last_name','Prezime:'); !!}
                    @if($errors->has('last_name'))
                        {!! Form::text('last_name',Input::old('last_name'),['class'=>'form-control has-error','placeholder'=>'Unesi svoje prezime','required'=>'required']); !!}
                        @foreach($errors->get('last_name') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('last_name',$userDetails->last_name,['class'=>'form-control','placeholder'=>'Unesi svoje prezime','required'=>'required']); !!}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('username','Korisnicko ime:'); !!}
                    @if($errors->has('username'))
                        {!! Form::text('username',Input::old('username'),['class'=>'form-control has-error','placeholder'=>'Unesi svoje korisnicko ime','required'=>'required']); !!}
                        @foreach($errors->get('username') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('username',$user->username,['class'=>'form-control','placeholder'=>'Unesi svoje korisnicko ime','required'=>'required']); !!}
                    @endif
                </div>

               {{-- <div class="form-group">

                    {!! Form::label('email','E-Mail:'); !!}


                    @if($errors->has('email'))
                        {{ Form::email('email',Input::old('email'),['class'=>'form-control has-error','placeholder'=>'Unesi svoju e-mail addresu','required'=>'required']) }}
                        @foreach($errors->get('email') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {{ Form::email('email',$user->email,['class'=>'form-control','placeholder'=>'Unesi svoju e-mail addresu','required'=>'required']) }}
                    @endif


                </div>--}}
                <div class="form-group">

                    {!! Form::label('pid','Broj licne karte:'); !!}

                    {{ Form::number('pid',$userDetails->pid,['class'=>'form-control','placeholder'=>'Unesi broj licne karte','required'=>'required']) }}

                </div>
                <div class="form-group">

                    {!! Form::label('age','Godina:'); !!}

                    {{ Form::number('age',$userDetails->age,['class'=>'form-control','placeholder'=>'Unesi godine','required'=>'required']) }}

                </div>

                <div class="form-group">

                    {!! Form::label('address','Adresa stanovanja:'); !!}

                    {!! Form::text('address',$userDetails->address,['class'=>'form-control','placeholder'=>'Unesi adresu stanovanja','required'=>'required']); !!}
                </div>
                <div class="form-group row">

                    {!! Form::label('role','Role:'); !!}
                    <select name="gender" id="select2" class="form-control" style="width: 100%">
                        <option value="M">M</option>
                        <option value="Z">Z</option>

                    </select>

                </div>
                <div class="form-group">

                    {!! Form::label('employee_number','Id radnika:'); !!}

                    {!! Form::number('employee_number',$userDetails->employee_number,['class'=>'form-control','placeholder'=>'Unesi ID radnika (Opciono)']); !!}
                </div>




                <div class="form-group">

                    {!! Form::label('phone_number','Br. telefona:'); !!}


                    <div class="input-group mb20">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>

                        {{ Form::number('phone_number',$userDetails->phone_number,['class'=>'form-control','placeholder'=>'Unesi svoj broj telefona','id'=>'phone','required'=>'required']) }}

                    </div>

                </div>
                <div class="form-group row">

                    {!! Form::label('role','Rola:'); !!}
                    @if(!empty($roles))
                        <select name="role" id="select2" class="form-control" style="width: 100%">
                            @foreach($roles as $role)
                                <option value="{{$role->id}}">{{$role->display_name}}</option>
                            @endforeach
                        </select>

                    @endif
                </div>

            </div>
            <div class="row">

                <div class="form-group" style="margin-left: 35%;">
                    <div class="col-lg-5">
                    </div>
                    <div class="col-lg-5">
                        {{Form::reset('Resetuj Unos',['class'=>'btn btn-default'])}}

                        <a href="{{url('users')}}">{{Form::button('Otkazi',['class' =>'btn btn-warning'])}}</a>
                        {{Form::submit('Snimi promene',['class'=>'btn btn-success'])}}
                    </div>
                    <div class="col-lg-2" style="float: right">

                        <a data-toggle="modal" href="#myModal" class="btn btn-danger" id="editPassword"
                           data-user={{$user->user_id}}
                                   role="button">Promeni sifru
                        </a>
                    </div>

                    {{Form::close()}}
                </div>


            </div>
        </div>
    </div>

    {!! Form::open(['url'=> ['users/editpassword',$user->user_id],'method' =>'PUT']) !!}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Promeni sifru</h4>
                </div>
                <div class="modal-body" style="height: 150px">
                    <div class="form-group form-horizontal">
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                            <label for="password" class="col-lg-3 control-label">Nova sifra</label>

                            <div class="col-lg-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-lg-3 control-label">Potvrdi sifru</label>

                            <div class="col-lg-8">
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <br>
                    <br>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Otkazi</button>

                        {!! Form::submit('Snimi novu sifru',['class'=>'btn btn-success']) !!}
                        {!! Form::close(); !!}

                </div>
            </div>
        </div>
    </div>


@endsection
