<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CoffeeTime</title>

    @yield('stylesheets')
    <link rel="stylesheet" type="text/css" href="{{asset('lib/fontawesome/css/font-awesome.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/weather-icons/css/weather-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/quirk.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/jquery-toggles/toggles-full.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap-date-picker/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/select2/select2.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css')}}">
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('lib/bootstrap-data-table/dataTables.bootstrap.css')}}">--}}

    <link rel="icon" sizes="64x64" href="{{asset('images/icon/icon_black.png')}}">


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
                <img src="{{asset('images/icon/icon_white.png')}}" alt="" class="media-object img-square" style="width:25%;height:40px;margin-left: 40%;">
            </a>

        </div><!-- logopanel -->


        <div class="headerbar">

            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>


            <div class="header-right">

                <ul class="headermenu">

                    <li>
                        <div class="logopanel">
                            <a href="{{url(('/'))}}">
                                <img src="{{asset('images/icon/icon_text_white.png')}}" alt="" class="media-object img-square"
                                     style="width:100%;height:40px; margin-left: -650px">
                            </a>
                        </div>
                    </li>
                    <li>

                        {{--<div id="noticePanel" class="btn-group">--}}
                        {{--<button class="btn btn-notice alert-notice" data-toggle="dropdown">--}}
                        {{--<i class="fa fa-globe"></i>--}}
                        {{--</button>--}}
                        {{--<div id="noticeDropdown" class="dropdown-menu dm-notice pull-right">--}}
                        {{--<div role="tabpanel">--}}
                        {{--<!-- Nav tabs -->--}}
                        {{--<ul class="nav nav-tabs nav-justified" role="tablist">--}}
                        {{--<li class="active"><a data-target="#notification" data-toggle="tab">Notifications (2)</a></li>--}}
                        {{--<li><a data-target="#reminders" data-toggle="tab">Reminders (4)</a></li>--}}
                        {{--</ul>--}}

                        {{--<!-- Tab panes -->--}}
                        {{--<div class="tab-content">--}}
                        {{--<div role="tabpanel" class="tab-pane active" id="notification">--}}
                        {{--<ul class="list-group notice-list">--}}
                        {{--<li class="list-group-item unread">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<i class="fa fa-envelope"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">New message from Weno Carasbong</a></h5>--}}
                        {{--<small>June 20, 2015</small>--}}
                        {{--<span>Soluta nobis est eligendi optio cumque...</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item unread">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<i class="fa fa-user"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">Renov Leonga is now following you!</a></h5>--}}
                        {{--<small>June 18, 2015</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<i class="fa fa-user"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">Zaham Sindil is now following you!</a></h5>--}}
                        {{--<small>June 17, 2015</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<i class="fa fa-thumbs-up"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">Rey Reslaba likes your post!</a></h5>--}}
                        {{--<small>June 16, 2015</small>--}}
                        {{--<span>HTML5 For Beginners Chapter 1</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<i class="fa fa-comment"></i>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">Socrates commented on your post!</a></h5>--}}
                        {{--<small>June 16, 2015</small>--}}
                        {{--<span>Temporibus autem et aut officiis debitis...</span>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a class="btn-more" href="">View More Notifications <i class="fa fa-long-arrow-right"></i></a>--}}
                        {{--</div><!-- tab-pane -->--}}

                        {{--<div role="tabpanel" class="tab-pane" id="reminders">--}}
                        {{--<h1 id="todayDay" class="today-day">...</h1>--}}
                        {{--<h3 id="todayDate" class="today-date">...</h3>--}}

                        {{--<h5 class="today-weather"><i class="wi wi-hail"></i> Cloudy 77 Degree</h5>--}}
                        {{--<p>Thunderstorm in the area this afternoon through this evening</p>--}}

                        {{--<h4 class="panel-title">Upcoming Events</h4>--}}
                        {{--<ul class="list-group">--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<h4>20</h4>--}}
                        {{--<p>Aug</p>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">HTML5/CSS3 Live! United States</a></h5>--}}
                        {{--<small>San Francisco, CA</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<h4>05</h4>--}}
                        {{--<p>Sep</p>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">Web Technology Summit</a></h5>--}}
                        {{--<small>Sydney, Australia</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<h4>25</h4>--}}
                        {{--<p>Sep</p>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">HTML5 Developer Conference 2015</a></h5>--}}
                        {{--<small>Los Angeles CA United States</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--<li class="list-group-item">--}}
                        {{--<div class="row">--}}
                        {{--<div class="col-xs-2">--}}
                        {{--<h4>10</h4>--}}
                        {{--<p>Oct</p>--}}
                        {{--</div>--}}
                        {{--<div class="col-xs-10">--}}
                        {{--<h5><a href="">AngularJS Conference 2015</a></h5>--}}
                        {{--<small>Silicon Valley CA, United States</small>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<a class="btn-more" href="">View More Events <i class="fa fa-long-arrow-right"></i></a>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                        {{--</div>--}}
                    </li>
                    <li>
                        <div class="btn-group">
                            <button type="button" class="btn btn-logged" data-toggle="dropdown">
                                <img src="images/photos/loggeduser.png" alt="" />

                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="profile.html"><i class="glyphicon glyphicon-user"></i> My Profile</a></li>
                                <li><a href="#"><i class="glyphicon glyphicon-cog"></i> Account Settings</a></li>
                                <li><a href="{{url(('reports'))}}"><i class="glyphicon glyphicon-question-sign"></i> Help</a></li>
                                <li><a href="{{url(('logout'))}}"><i class="glyphicon glyphicon-log-out logout"></i> Log Out</a></li>
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
                <div class="media-left">
                    <a href="#">
                        <img src="../images/photos/loggeduser.png" alt="" class="media-object img-circle">
                    </a>
                </div>
                <div class="media-body">
                    <h4 class="media-heading"></h4>
                    <span>Helix Dev</span>
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
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@yield('scripts')


</body>
</html>