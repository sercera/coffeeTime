<!DOCTYPE html>
<html lang="en" class="wow-animation">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="format-detection" content="telephone=no"/>

    <title>coffeeTime</title>
    <link rel="icon" sizes="64x64" href="{{asset('images/icon/icon_black.png')}}">

<!-- Stylesheets -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,500,600,700%7CPlayfair+Display:400,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="{{asset('FRONTEND/site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('FRONTEND/site/css/style.css')}}">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>


@include('error')
<!--========== PRELOADER ==========-->
<div id="page-preloader">
    <div class="contpre">
        <div class="cssload-container">
            <div class="cssload-bouncywrap">
                <div class="cssload-cssload-dotcon cssload-dc1">
                    <div class="cssload-dot"></div>
                </div>
                <div class="cssload-cssload-dotcon dc2">
                    <div class="cssload-dot"></div>
                </div>
                <div class="cssload-cssload-dotcon dc3">
                    <div class="cssload-dot"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- The Main Wrapper -->
<div class="global-wrapper">

    <!--============================== CONTENT ==============================-->
    <main class="site-container">

        <a href="#" class="nav-toggle"><span></span></a>
        <div class="nav">
            <div class="nav-inside light-section">

                <a href="./" class="nav-logotype hide show-lg-block">
                    <img src="img/logo.png" width="82" height="52" alt=""/>
                </a>

                <!-- INFO HEADER -->
                <div class="info-header info-header-default active-info">
                    <h6 class="text-semi-bold hide show-sm-block" style="color:black">
                        <span class="icon icon-sm fa fa-phone"></span>
                        <span class="text-middle">{{$caffe->call_number}}</span>

                    </h6>
                    <div class="popup popup-1 hide-sm" data-toggle="popover" title="Broj telefona" data-content="{{$caffe->call_number}}">
                        <span class="icon icon-sm fa fa-phone"></span>
                    </div>
                    <h2 class="default-font text-bold letter-spacing-30" style="color:black"><a href="/">coffeeTime</a></h2>
                    <h6 class="text-semi-bold hide show-sm-block ml-sm-40 ml-md-0" style="color:black">
                        <span class="icon icon-sm fa fa-clock-o"></span>
                        <span>Pon-Ned {{$caffe->work_hour_from}}-{{$caffe->work_hour_to}}</span>
                    </h6>
                    <div class="popup popup-2 hide-sm ml-20 ml-sm-0" data-toggle="popover" title="Radno vreme" data-content="Pon-Ned {{$caffe->work_hour_from}}-{{$caffe->work_hour_to}}">
                        <span class="icon icon-sm fa fa-clock-o"></span>
                    </div>
                </div>

                <div class="info-header info-header-content">
                    <a class="primary-icon-link btn-return hide show-sm-flex" href="#1Page"><span class="icon icon-sm fa fa-home"></span> Početna strana</a>
                    <a class="primary-icon-link scroll-btn" href="#4Page"><span class="icon icon-sm fa fa-file-text-o"></span> Rezervišite sto</a>
                </div>
            </div>
        </div>
        <div id="menu">
            <!-- SIDEBAR MENU -->
            <div class="main-nav">
                <img src="img/logo.png" width="82" height="52" class="hide-lg ml-50 ml-lg-0" alt=""/>
                <ul class="">
                    <li data-menuanchor="1Page"><a href="#1Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">01</span><span class="text-middle pl-20" style="color:black">Početna</span></a></li>
                    <li data-menuanchor="2Page"><a href="#2Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">02</span><span class="text-middle pl-20" style="color:black">O nama</span></a></li>
                    <li data-menuanchor="3Page"><a href="#3Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">03</span><span class="text-middle pl-20" style="color:black">Menu</span></a></li>
                    <li data-menuanchor="4Page"><a href="#4Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">04</span><span class="text-middle pl-20" style="color:black">Rezervacije</span></a></li>
                    <li data-menuanchor="5Page"><a href="#5Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">05</span><span class="text-middle pl-20" style="color:black">Postovi</span></a></li>
                    <li data-menuanchor="6Page"><a href="#6Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">06</span><span class="text-middle pl-20" style="color:black">Tim</span></a></li>
                    <li data-menuanchor="7Page"><a href="#7Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">07</span><span class="text-middle pl-20" style="color:black">Kontakt</span></a></li>
                </ul>
            </div>
        </div>


        <div id="fullpage">

            <!--========== HOME ==========-->
            <header class="section section-default bg-1 light-section active" id="section0">
                <div class="">
                    <h1 class="default-font text-bold letter-spacing-30" style="color:black">{{$caffe->name}}</h1>
                    <h2 class="default-font text-bold letter-spacing-30 mt-20" style="color:black">{{$caffe->short_description}}</h2>
                    <div class="pulsing-ring show-inline-block mt-50">
                        <a href="#4Page" class="btn btn-main text-primary" style="color:black">
                            <span>Rezervišite</span>
                            <span>sto</span>
                        </a>
                    </div>
                    <br />
                    <br />
                    <div>
                        <h5 class="default-font text-bold letter-spacing-30" style="color:black">Broj slobodnih stolova: {{$mesta}}</h5>
                    </div>
                </div>
            </header>

            <!--========== ABOUT ==========-->
            <section class="section section-content" id="section1">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-lg-left">
                        <h3 class="col-xs-10">O nama</h3>
                        <div class="col-xl-12 mt-30 mt-md-50">
                            <div class="row flex-center flex-md-left">
                                <div class="col-sm-10 col-md-6">
                                    <div class="media media-md">
                                        <div class="media-left">
                                            <img src="img/index-02.png" width="143" height="143" alt="">
                                        </div>
                                        <div class="media-body">
                                            <h4 class="text-medium text-primary">{{$caffe->name}}</h4>
                                        </div>
                                    </div>
                                    <h6 class="text-medium">{{$caffe->short_description}}</h6>
                                    <p class="mt-30">{{$caffe->description}}
                                        <br class="hide show-md-block">
                                        <br>
                                    </p>
                                    <img src="{{asset('images/caffe_images/' . $caffe->image)}}" /> <br />
                                    {{--<img src="{{$caffe->image}}" width="143" height="143" alt="">--}}


                                    <div class="text-center text-lg-right mt-30"><a href="{{$caffe->www}}" class="btn btn-md btn-primary">SAZNAJ VIŠE</a></div>
                                </div>
                                <div class="col-sm-10 col-md-6 col-lg-5 mt-40 mt-md-0">
                                    <h6 class="text-primary">Adresa</h6>
                                    <p class="big second-font text-medium ls-0 mt-20">{{$caffe->address}}</p>
                                    <br/>
                                    <h6 class="text-primary">Radno vreme</h6>
                                    <p class="big second-font text-medium ls-0 mt-20">Pon-Ned {{$caffe->work_hour_from}}-{{$caffe->work_hour_to}}</p>
                                    <br />
                                    <h6 class="text-primary">Broj telefona</h6>
                                    <p class="big second-font text-medium ls-0 mt-20">{{$caffe->call_number}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--========== MENUS ==========-->
            <section class="section section-content " id="section2">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Naši meniji</h3>
                        <div class="col-xl-10 mt-30 mt-md-50">
                            <div class="row flex-center flex-xl-left">

                                <div class="col-sm-10 col-md-6">
                                    @foreach($menus as $menu)
                                        @if($menu->fk_for_caffe==$caffe->caffe_id)
                                            <div class="media media-md">
                                                <div class="media-body">
                                                    <a href=""><h4 class="text-medium text-primary" style="text-align: center">{{$menu->name}}</h4></a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--========== RESERVATION ==========-->
            <section class="section section-content" id="section3">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-lg-left">
                        <h3 class="col-xs-10">Reservation</h3>
                        <div class="col-xl-12 mt-30 mt-md-50">
                            {{--<form action="{{route('reserve')}}" method="POST" class="row flex-center flex-md-left reservation-form">--}}
                            {!! Form::open(['url' => 'reservation/send' ,  'class' => 'row flex-center flex-md-left'])!!}
                                <div class="col-md-6 col-lg-5 col-xl-offset-1 col-md-order-1">
                                    <p class="second-font text-primary text-bold ls-0">CHOOSE A TABLE NUMBER TO RESERVE IT</p>
                                    <div style="display: grid;grid-template-columns: repeat(2, 1fr);grid-gap: 10px;">
                                        @if(count($tables) > 0)
                                            @foreach($tables as $table)
                                                @if($table->fk_for_caffe==$caffe->caffe_id)
                                                    <div style="border: 2px solid #2C3468;border-radius: 5px; @if($table->is_reserved==0 && $table->is_taken==0 )
                                                            background-color: #32cd32;
                                                    @else
                                                            background-color: #cd5c5c;
                                                    @endif padding: 1em;color: #fff; width: 250px;">
                                                        <div class="text-center">
                                                            {{$table->table_number}}
                                                        </div>
                                                        <div>
                                                            @if($table->is_taken==0)
                                                                Slobodan
                                                            @else
                                                                Zauzet
                                                            @endif
                                                            @if($table->is_reserved==0)
                                                                <p class="pull-right"> Nije rezervisan </p>
                                                            @else
                                                                <p class="pull-right"> Rezervisan </p>
                                                            @endif
                                                        </div>

                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="form show-flex flex-center flex-md-left">
                                        {{--<input name="quantity" class="quantity text-center" value="1" max-value="{{$ukupno}}">--}}
                                        {{--{{Form::number('table_number', '' , ['class' => 'form-control', 'placeholder' => 'Unesite broj stola','required'=>'required'])}}--}}
                                        {{Form::label('table_number', 'Izaberite broj stola:')}}
                                        <select class="form-control input-effect" name="table_number">
                                            @foreach($tables as $table)
                                                @if($table->fk_for_caffe == $caffe->caffe_id)
                                                <option value="{{$table->table_id}}"> {{$table->table_number}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-md-6 col-xl-5 mt-30 mt-md-0">
                                    <p class="ls-0">Unesite broj stola koji zelite da rezervisete. Rezervacija vazi 15 minuta od trenutka rezervacije.</p>
                                    <div class="form">
                                        {{--<div class="form-group">--}}
                                            {{--<input autocomplete="off" required type="hidden" value="1" name= "user_id">--}}
                                        {{--</div>--}}
                                        <div class="form-group">
                                            {{--<input autocomplete="off" required type="hidden" value="{{$caffe->caffe_id}}" name= "caffe_id">--}}
                                            {{Form::hidden('caffe_id', $caffe->caffe_id )}}
                                        </div>
                                        <div class="form-group">
                                            {{--<textarea name="comment" class="form-control input-effect" placeholder="Comment"></textarea>--}}
                                            {{Form::textarea('comment', '' , ['class' => 'form-control input-effect', 'placeholder' => 'Unesite komentar'])}}
                                            <span class="focus-border"><i></i></span>
                                        </div>

                                        {{--<div class="text-center text-lg-right"><button type="submit" class="btn btn-lg btn-primary mt-30">RESERVIŠI</button></div>--}}
                                        <div  class="text-center text-lg-right">
                                            {{Form::submit('Potvrdi',['class'=>'btn btn-primary mt-30'])}}
                                        </div>

                                    </div>
                                </div>
                            </form>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </section>

            <!--========== POSTS ==========-->
            <section class="section section-content " id="section4">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Postovi</h3>
                        <div class="col-xl-1 mt-20 mt-md-30">
                                @foreach($posts as $post)
                                    @if($post->fk_for_caffe==$caffe->caffe_id)
                                        <div style="margin:15px; padding: 15px; box-shadow: 1px 1px 10px 2px silver;">
                                            <h4 class="text-semi-bold mt-30">{{$post->title}}</h4>
                                            <p class="second-font text-primary mt-10">{{$post->content}}</p>
                                            <br />
                                        </div>
                                    @endif
                                @endforeach
                        </div>
                    </div>
                </div>
            </section>




            <!--========== TEAM ==========-->
            <section class="section section-content" id="section5">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Naš tim</h3>
                        <div class="col-lg-10 mt-30 mt-md-50">
                            <div class="row flex-left" style="marign:10px;padding: 10px;">
                                @foreach($users as $user)
                                    @if($user->fk_for_caffe==$caffe->caffe_id)
                                        @foreach($usersDetails as $userDetails)
                                            @if($userDetails->fk_for_user==$user->user_id)
                                                <div style="margin:15px; padding: 15px; box-shadow: 1px 1px 10px 2px silver;">
                                                    <img src="{{asset('images/caffe_images/' . $caffe->image)}}" width="300" height="300" class="scaling-image" alt="{{$user->ussername}}" align="right" margin="5px" >
                                                    <h5 class="text-semi-bold mt-30">{{$user->username}}</h5>
                                                    <p class="second-font text-primary mt-10">
                                                        @if($user->hasRole('owner'))
                                                            Vlasnik kafića
                                                        @else
                                                            Radnik kafića
                                                        @endif
                                                    </p>
                                                    <p class="mt-10 pr-md-20">
                                                        {{$userDetails->first_name}} {{$userDetails->last_name}}, {{$userDetails->age}}<br />
                                                        {{$user->email}}<br />
                                                    </p>
                                                    <ul class="list-inline">
                                                        <li><a href="#" class="icon icon-md fa fa-facebook"></a></li>
                                                        <li><a href="#" class="icon icon-md fa fa-twitter"></a></li>
                                                        <li><a href="#" class="icon icon-md fa fa-linkedin"></a></li>
                                                    </ul>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>


            <!--========== CONTACT US ==========-->
            <section class="section section-content " id="section6">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Kontakt</h3>
                        <div class="col-xl-12 mt-30 mt-md-50">
                            <div class="row flex-center flex-xl-left">
                                <div class="col-md-6 col-xl-5">
                                    <img src="img/contact-img.jpg" width="571" height="402" alt="">
                                </div>

                                <!-- Contact Form -->
                                <div class="col-sm-10 col-md-6 col-lg-5 mt-30 mt-md-0">
                                    <h6 class="text-medium">Kontaktiraj nas</h6>

                                    {!! Form::open(['route'=>['contact',$caffe->caffe_id], 'method'=>'POST']) !!}
                                    <div class="form-group">
                                        {{Form::text('email', '' , ['class' => 'form-control', 'placeholder' => 'Unesite email','required'=>'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::text('subject', '' , ['class' => 'form-control', 'placeholder' => 'Unesite naslov','required'=>'required'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::textarea('message', '' , ['class' => 'form-control', 'placeholder' => 'Poruka','required'=>'required'])}}
                                    </div>
                                    <div>
                                        {{Form::submit('POSALJI PORUKU',['class'=>'btn btn-primary'])}}
                                    </div>
                                    {!! Form::close() !!}


                                    {{--<form class="contact-form js-form" method="POST" action="{{url('caffe/show/{caffe_id}/contact')}}">--}}
                                    {{--{{csrf_field()}}--}}
                                    {{--<div class="row">--}}
                                    {{--<div class="form-group col-md-12">--}}
                                    {{--<input autocomplete="off" required type="email" name="email" class="form-control" placeholder="E-mail">--}}
                                    {{--</div>--}}
                                    {{--<br />--}}
                                    {{--<div class="form-group col-md-12 mt-20 mt-md-30">--}}
                                    {{--<input autocomplete="off" required type="text" name="subject" class="form-control" placeholder="Naslov">--}}
                                    {{--</div>--}}
                                    {{--<div class="form-group col-md-12 mt-20 mt-md-30">--}}
                                    {{--<textarea required name="message" class="form-control" placeholder="Poruka"></textarea>--}}
                                    {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<button type="submit" class="btn btn-lg btn-primary mt-20">POŠALJI PORUKU</button>--}}
                                    {{--</form>--}}
                                </div>
                            </div>

                            <div class="contact-data row">
                                <div class="col-xl-10">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-xl-4">
                                            <p class="second-font text-bold text-primary ls-0">ADRESA</p>
                                            <p class="mt-10 mt-md-20">
                                                {{$caffe->address}} <br>
                                                {{$caffe->city}} <br>
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-lg-5 col-xl-4 mt-30 mt-md-0">
                                            <p class="second-font text-bold text-primary ls-0">TELEFON</p>
                                            <p class="mt-10 mt-md-20">
                                                {{$caffe->call_number}} <br>
                                            </p>
                                        </div>
                                        <div class="col-md-5 col-lg-4 mt-30 mt-md-0">
                                            <p class="second-font text-bold text-primary ls-0">BLOG</p>
                                            <p class="mt-10 mt-md-20">
                                                <a href="{{$caffe->www}}">{{$caffe->www}}</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>
</div>
<!-- Core Scripts -->
<script src="{{asset('FRONTEND/site/js/minified.js')}}"></script>
<!-- Additional Functionality Scripts -->
<script src="{{asset('FRONTEND/site/js/main.js')}}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
{!! Toastr::message() !!}
</body>
</html>