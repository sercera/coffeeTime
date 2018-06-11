@extends('layout')

@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    @include('error')

    <div class="row panel-quick-page">
        <a href="{{url('caffe')}}">
            <div class="col-xs-4 col-sm-5 col-md-4 page-support">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Lista kafića</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-coffee"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('table')}}">
            <div class="col-xs-4 col-sm-4 col-md-4 page-user">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title"> Lista stolova</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('users')}}">
            <div class="col-xs-4 col-sm-4 col-md-4 page-reports">
                <div class="panel" id="users">
                    <div class="panel-heading">
                        <h4 class="panel-title">Lista radnika</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-users"></i>
                        </div>
                    </div>
                </div>

            </div>
        </a>
        <a href="{{url('article')}}">
            <div class="col-xs-4 col-sm-4 col-md-4 page-messages">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Proizvodi</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-beer"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('menu')}}">
            <div class="col-xs-4 col-sm-4 col-md-4 page-events">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Lista menija</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-book"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a href="{{url('users/create')}}">
            <div class="col-xs-4 col-sm-4 col-md-4 page-statistics">
                <div class="panel">
                    <div class="panel-heading">
                        <h4 class="panel-title">Dodaj novog korisnika</h4>
                    </div>
                    <div class="panel-body">
                        <div class="page-icon">
                            <i class="fa fa-user-plus"></i>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <div class="col-xs-4 col-sm-4 col-md-4 page-statistics">
        </div>
    </div>

@endsection