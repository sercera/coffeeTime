@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="background-layout"></div>
        <div class="row justify-content-center">
            <div class="col-md-8" style="margin-top: 10%">
                <div class="card">
                    <div class="card-header">{{ __('Prijavi se') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}


                            <div class="form-group row ">
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('Korisničko ime') }}</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback">
                                        <strong>Wrong username</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Lozinka') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                    @if(!empty($login_error))
                                        <span class="help-block" style="margin-top: 20px;font-size: 80%">
                                        <strong style="color: #d9534f; ">*{{ $login_error }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Zapamti me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Prijavi se') }}
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Zaboravili ste lozinku?') }}
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
