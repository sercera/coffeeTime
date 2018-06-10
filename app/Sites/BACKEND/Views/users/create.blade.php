@extends('layout')
@section('active-menu')
    @include('active-menu')
@endsection

@section('content')

    <ol class="breadcrumb breadcrumb-quirk">
        <li>
            <a href="{{url('/')}}">
                <i class="glyphicon glyphicon-home"></i>
                Home
            </a>
        </li>
        <li class="active">
            <a href="{{url('users/create')}}">
                <i class="fa fa-user-plus"></i>
                Dodaj novog usera

            </a>
        </li>
    </ol>

    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title" style="margin-left: 40%;">Dodaj novog usera</h4>
            </div>
        </div>
        <div class="panel-body" style="margin-left: 20px">
            <div class="row">

                {!! Form::open(['url'=>'users','method'=>'POST','class' =>'form-horizontal']); !!}

                <div class="form-group">

                    {!! Form::label('first_name','Ime:'); !!}

                    @if($errors->has('first_name'))

                        {!! Form::text('first_name',Input::old('first_name'),['class'=>'form-control has-error','placeholder'=>'Unesi svoje ime','required'=>'required']); !!}

                        @foreach($errors->get('first_name') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::text('first_name',Input::old('first_name'),['class'=>'form-control','placeholder'=>'Unesi svoje ime','required'=>'required']); !!}
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
                        {!! Form::text('last_name',Input::old('last_name'),['class'=>'form-control','placeholder'=>'Unesi svoje prezime','required'=>'required']); !!}
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
                        {!! Form::text('username',Input::old('username'),['class'=>'form-control','placeholder'=>'Unesi svoje korisnicko ime','required'=>'required']); !!}
                    @endif
                </div>

                <div class="form-group">

                    {!! Form::label('email','E-Mail:'); !!}


                    @if($errors->has('email'))
                        {{ Form::email('email',Input::old('email'),['class'=>'form-control has-error','placeholder'=>'Unesi svoju e-mail addresu','required'=>'required']) }}
                        @foreach($errors->get('email') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {{ Form::email('email',Input::old('email'),['class'=>'form-control','placeholder'=>'Unesi svoju e-mail addresu','required'=>'required']) }}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('pid','Broj licne karte:'); !!}

                    {{ Form::number('pid',Input::old('pid'),['class'=>'form-control','placeholder'=>'Unesi broj licne karte','required'=>'required']) }}

                </div>
                <div class="form-group">

                    {!! Form::label('age','Godina:'); !!}

                    {{ Form::number('age',Input::old('age'),['class'=>'form-control','placeholder'=>'Unesi godine','required'=>'required']) }}

                </div>

                <div class="form-group">

                    {!! Form::label('address','Adresa stanovanja:'); !!}

                        {!! Form::text('address',Input::old('address'),['class'=>'form-control','placeholder'=>'Unesi adresu stanovanja','required'=>'required']); !!}
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

                    {!! Form::number('employee_number',Input::old('employee_number'),['class'=>'form-control','placeholder'=>'Unesi ID radnika (Opciono)']); !!}
                </div>




                <div class="form-group">

                    {!! Form::label('phone_number','Br. telefona:'); !!}


                    <div class="input-group mb20">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>

                        {{ Form::number('phone_number',Input::old('phone_number'),['class'=>'form-control','placeholder'=>'Unesi svoj broj telefona','id'=>'phone','required'=>'required']) }}

                    </div>

                </div>


                <div class="form-group">

                    {!! Form::label('password','Sifra:'); !!}

                    @if($errors->has('password'))
                        {!! Form::password('password',['class'=>'form-control has-error','placeholder'=>'Unesi sifru','required'=>'required']); !!}
                        @foreach($errors->get('password') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::password('password',['class'=>'form-control','placeholder'=>'Unesi sifru','required'=>'required']); !!}
                    @endif


                </div>
                <div class="form-group">

                    {!! Form::label('password_confirmation','Potvrda sifre:'); !!}

                    @if($errors->has('password_confirmation'))
                        {!! Form::password('password_confirmation',['class'=>'form-control has-error','placeholder'=>'Potvrdi sifru','required'=>'required']); !!}
                        @foreach($errors->get('password_confirmation') as $error)
                            <br> <p class="alert alert-warning">{!! $error !!}</p>
                        @endforeach
                    @else
                        {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Potvrdi sifru','required'=>'required']); !!}
                    @endif


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
                        {{Form::submit('Kreiraj korisnika',['class'=>'btn btn-success'])}}
                    </div>

                    {{Form::close()}}
                </div>


            </div>
        </div>
    </div>


@endsection
