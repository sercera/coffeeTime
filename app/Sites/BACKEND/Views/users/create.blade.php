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
            <a href="{{url('users/create')}}">
                <i class="fa fa-user-plus"></i>
                Dodaj novog korisnika
            </a>
        </li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Dodaj novog korisnika</h4>
            </div>
        </div>
        <div class="panel-body" style="margin-left: 20px">
            <div class="row">

                {!! Form::open(['url'=>'users','method'=>'POST','class' =>'form-horizontal']); !!}

                <div class="form-group">

                    {!! Form::label('first_name','Ime'); !!}

                    @if($errors->has('first_name'))

                        {!! Form::text('first_name',Input::old('first_name'),['class'=>'form-control has-error','placeholder'=>'Unesite svoje ime','required'=>'required']); !!}

                        @foreach($errors->get('first_name') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('first_name',Input::old('first_name'),['class'=>'form-control','placeholder'=>'Unesite svoje ime','required'=>'required']); !!}
                    @endif
                </div>

                <div class="form-group ">
                    {!! Form::label('last_name','Prezime'); !!}
                    @if($errors->has('last_name'))
                        {!! Form::text('last_name',Input::old('last_name'),['class'=>'form-control has-error','placeholder'=>'Unesite svoje prezime','required'=>'required']); !!}
                        @foreach($errors->get('last_name') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('last_name',Input::old('last_name'),['class'=>'form-control','placeholder'=>'Unesite svoje prezime','required'=>'required']); !!}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('username','Korisničko ime'); !!}
                    @if($errors->has('username'))
                        {!! Form::text('username',Input::old('username'),['class'=>'form-control has-error','placeholder'=>'Unesite svoje korisnicko ime','required'=>'required']); !!}
                        @foreach($errors->get('username') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('username',Input::old('username'),['class'=>'form-control','placeholder'=>'Unesite svoje korisnicko ime','required'=>'required']); !!}
                    @endif
                </div>

                <div class="form-group">

                    {!! Form::label('email','E-mail adresa'); !!}


                    @if($errors->has('email'))
                        {{ Form::email('email',Input::old('email'),['class'=>'form-control has-error','placeholder'=>'Unesite svoju e-mail adresu','required'=>'required']) }}
                        @foreach($errors->get('email') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {{ Form::email('email',Input::old('email'),['class'=>'form-control','placeholder'=>'Unesite svoju e-mail adresu','required'=>'required']) }}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('pid','Broj lične karte'); !!}

                    {{ Form::number('pid',Input::old('pid'),['class'=>'form-control','placeholder'=>'Unesite broj licne karte','required'=>'required']) }}

                </div>
                <div class="form-group">

                    {!! Form::label('age','Godina'); !!}

                    {{ Form::number('age',Input::old('age'),['class'=>'form-control','placeholder'=>'Unesite godine','required'=>'required']) }}

                </div>

                <div class="form-group">

                    {!! Form::label('address','Adresa stanovanja'); !!}

                        {!! Form::text('address',Input::old('address'),['class'=>'form-control','placeholder'=>'Unesite adresu stanovanja','required'=>'required']); !!}
                </div>
                <div class="form-group row">

                    {!! Form::label('gender','Pol'); !!}
                        <select name="gender" id="select2" class="form-control" style="width: 100%">
                                <option value="M">M</option>
                                <option value="Z">Ž</option>
                        </select>

                </div>
                <div class="form-group">

                    {!! Form::label('employee_number','ID radnika'); !!}

                    {!! Form::number('employee_number',Input::old('employee_number'),['class'=>'form-control','placeholder'=>'Unesite ID radnika (Opciono)']); !!}
                </div>




                <div class="form-group">

                    {!! Form::label('phone_number','Broj telefona'); !!}


                    <div class="input-group mb20">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>

                        {{ Form::number('phone_number',Input::old('phone_number'),['class'=>'form-control','placeholder'=>'Unesite svoj broj telefona','id'=>'phone','required'=>'required']) }}

                    </div>

                </div>


                <div class="form-group">

                    {!! Form::label('password','Lozinka'); !!}

                    @if($errors->has('password'))
                        {!! Form::password('password',['class'=>'form-control has-error','placeholder'=>'Unesite lozinku','required'=>'required']); !!}
                        @foreach($errors->get('password') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Unesite lozinku','required'=>'required']); !!}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('password_confirmation','Potvrda lozinke'); !!}

                    @if($errors->has('password_confirmation'))
                        {!! Form::password('password_confirmation',['class'=>'form-control has-error','placeholder'=>'Potvrdite lozinku','required'=>'required']); !!}
                        @foreach($errors->get('password_confirmation') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Potvrdi lozinku','required'=>'required']); !!}
                    @endif


                </div>
                <div class="form-group row">

                    {!! Form::label('role','Uloga'); !!}
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
                        {{Form::reset('Resetuj unos',['class'=>'btn btn-default'])}}

                        <a href="{{url('users')}}">{{Form::button('Otkaži',['class' =>'btn btn-warning'])}}</a>
                        {{Form::submit('Kreiraj korisnika',['class'=>'btn btn-success'])}}
                    </div>

                    {{Form::close()}}
                </div>


            </div>
        </div>
    </div>


@endsection
