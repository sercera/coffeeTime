<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>coffeeTime</title>
    <link rel="icon" sizes="64x64" href="{{asset('images/icon/icon_black.png')}}">

    @yield('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('lib/fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/weather-icons/css/weather-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/quirk.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/lib/jquery-toggles/toggles-full.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap-date-picker/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/select2/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}">

    {{--    <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap-data-table/dataTables.bootstrap.css')}}">--}}




    <script src="{{asset('lib/modernizr/modernizr.js')}}"></script>
    <script src="{{asset('lib/html5shiv/html5shiv.js')}}"></script>
    <script src="{{asset('lib/respond/respond.src.js')}}"></script>


    {{--<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css">--}}
    {{--<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">--}}


</head>
<body>

<header>
    <div class="headerpanel">


        <div class="logopanel">

            <a href="{{url(('/'))}}">
                <img src="{{asset('images/icon/icon_white.png')}}" alt="" class="media-object img-square"
                     style="width:25%;height:40px;margin-left: 40%;">
            </a>

        </div><!-- logopanel -->


        <div class="headerbar">

            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


            <div class="header-right">

                <ul class="headermenu">

                    <li>
                        <div class="logopanel">
                            <a href="{{url(('/'))}}">
                                <img src="{{asset('images/icon/icon_text_white.png')}}" alt=""
                                     class="media-object img-square"
                                     style="width:100%;height:40px; margin-left: -650px">
                            </a>
                        </div>
                    </li>
                    <li>

                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <i class="fa fa-bell"></i>  Obaveštenja
                                <span class="badge">{{count(Auth::user()->notifications)}}</span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                {{--@foreach()--}}
                                {{--<li></li>--}}
                                    {{--@endforeach--}}
                            </ul>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="images/photos/loggeduser.png" alt=""/>{{Auth::user()->username}}
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                <li><a href="{{url(('logout'))}}"><i class="glyphicon glyphicon-log-out logout"></i> Log
                                        Out</a></li>
                            </ul>
                        </div>
                    </li>

                </ul>
            </div><!-- header-right -->
        </div><!-- headerbar -->
    </div><!-- header-->
</header>

{{Form::open(['url'=>'logout','id'=>'logout-form','style'=>'display:hidden' ])}}
{{ csrf_field() }}
{{Form::submit('Logout')}}
{{Form::close()}}

<section>

    <div class="leftpanel">
        <div class="leftpanelinner">

            <!-- ################## LEFT PANEL PROFILE ################## -->

            <div class="media leftpanel-profile">
                <div class="media-body">
                    <h3 class="media-heading">{{Auth::user()->username}}</h3>

                </div>
            </div><!-- leftpanel-profile -->


        </div><!-- leftpanel-userinfo -->


        <div class="tab-content">

            <!-- ################# MAIN MENU ################### -->

            <div class="tab-pane active" id="mainmenu">

                <h5 class="sidebar-title">Glavni meni</h5>
                <ul class="nav nav-pills nav-stacked nav-quirk">
                    @yield('active-menu')
                </ul>
            </div><!-- tab-pane -->

        </div><!-- tab-content -->

    </div><!-- leftpanelinner -->
    </div><!-- leftpanel -->

    <div class="mainpanel">

        <div class="contentpanel">

            @yield('content')


        </div><!-- panel-body -->

    </div><!-- mainpanel -->

</section>


{{--<div class="footer">@yield('footer')</div>--}}

<script src="{{asset('lib/jquery/jquery.js')}}"></script>
<script src="{{asset('lib/jquery-data-table/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('lib/bootstrap-data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('lib/jquery-ui/jquery-ui.js')}}"></script>
<script src="{{asset('lib/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{asset('lib/jquery-toggles/toggles.js')}}"></script>
<script src="{{asset('js/quirk.js')}}"></script>
<script src="{{asset('lib/bootstrap-date-picker/bootstrap-datepicker3.js')}}"></script>
<script src="{{asset('lib/select2/select2.js')}}"></script>
<script src="{{asset('lib/jquery-validate/jquery.validate.js')}}"></script>


@yield('scripts')


</body>
</html>