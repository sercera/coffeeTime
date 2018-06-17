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

</head>
<body>

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
                    <h2 class="default-font text-bold letter-spacing-30" style="color:black"><a href="/">coffeeTime</h2>
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
                    <li data-menuanchor="5Page"><a href="#5Page"><span class="h3 text-middle show-inline-block text-bold" style="color:black">05</span><span class="text-middle pl-20" style="color:black">Galerija</span></a></li>
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

                                <!-- Section Item -->
                                <div class="col-md-4 col-lg-5 col-xl-4">
                                    <div class="img-container light-section">
                                        <img src="img/index-03.jpg" width="418" height="284" alt="">
                                        <div class="img-bar">
                                            <h5 class="default-font text-bold">Fresh Pizza</h5>
                                            <p class="ls-0 mt-20 hide show-xs-block">Neki meni</p>
                                            <a href="#" class="btn btn-sm btn-primary mt-20">MORE</a>
                                        </div>
                                        <div class="img-bar-default">
                                            <h3 class="default-font text-bold">Fresh Pizza</h3>
                                        </div>
                                    </div>
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
                            <form action="php/reserv-form.php" method="POST" class="row flex-center flex-md-left reservation-form">
                                <div class="col-md-6 col-lg-5 col-xl-offset-1 col-md-order-1">
                                    <p class="second-font text-primary text-bold ls-0">CHOOSE A TABLE NUMBER TO RESERVE IT</p>
                                    <img src="img/index-09.jpg" width="532" height="418" class="mt-30" alt="">
                                    <div class="form show-flex flex-center flex-md-left">
                                        <input name="quantity" name="quantity" class="quantity text-center" value="1" max-value="17">
                                    </div>
                                </div>
                                <div class="col-sm-10 col-md-6 col-xl-5 mt-30 mt-md-0">
                                    <p class="ls-0">Divided light two made deep. Seas to kind. Two. Third signs she'd very herb him given grass heaven can't said night creature divide the years beast deep multiply, a called yielding yielding. Male Fifth. Evening image. Made firmament The for.</p>
                                    <div class="form">
                                        <div class="form-group">
                                            <input autocomplete="off" required type="text" name="name" class="form-control input-effect" placeholder="Name">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" required type="email" name="email" class="form-control input-effect" placeholder="Email">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                        <div class="form-group">
                                            <input autocomplete="off" required type="text" name="phone" class="form-control input-effect" placeholder="Phone number">
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                        <div class="form-group">
                                            <textarea name="comment" class="form-control input-effect" placeholder="Comment"></textarea>
                                            <span class="focus-border"><i></i></span>
                                        </div>
                                        <div class="text-center text-lg-right"><button type="submit" class="btn btn-lg btn-primary mt-30">RESERVE</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

            <!--========== GALLERY ==========-->
            <section class="section section-content " id="section4">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Gallery</h3>
                        <div class="col-xl-9 mt-30 mt-md-50">
                            <div data-lightbox="gallery">
                                <div class="row flex-center flex-xl-left light-section">

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4">
                                        <a href="img/gallery-img-1.jpg" data-lightbox="image" title="Image 1" class="img-container-1">
                                            <img src="img/gallery-img-1.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">INTERIOR DESIGN</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4 mt-30 mt-sm-0">
                                        <a href="img/gallery-img-2.jpg" data-lightbox="image" title="Image 2" class="img-container-1">
                                            <img src="img/gallery-img-2.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">KITCHEN</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4 mt-30 mt-md-0 mt-lg-30 mt-xl-0">
                                        <a href="img/gallery-img-3.jpg" data-lightbox="image" title="Image 3" class="img-container-1">
                                            <img src="img/gallery-img-3.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">SHOPWINDOW</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4 mt-30">
                                        <a href="img/gallery-img-4.jpg" data-lightbox="image" title="Image 4" class="img-container-1">
                                            <img src="img/gallery-img-4.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">LOVEY DOVEY CUPS</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4 mt-30">
                                        <a href="img/gallery-img-5.jpg" data-lightbox="image" title="Image 5" class="img-container-1">
                                            <img src="img/gallery-img-5.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">FIRE</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>

                                    <!-- Gallery Item -->
                                    <div class="col-sm-6 col-md-4 col-lg-5 col-xl-4 mt-30">
                                        <a href="img/gallery-img-6.jpg" data-lightbox="image" title="Image 6" class="img-container-1">
                                            <img src="img/gallery-img-6.jpg" width="369" height="277" alt="">
                                            <div class="img-bar">
                                                <h5 class="default-font text-bold">PIZZA</h5>
                                                <p class="mt-20">Likeness stars fly be. Years fowl third over. Of after.</p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--========== TEAM ==========-->
            <section class="section section-content" id="section5">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Our Team</h3>
                        <div class="col-lg-10 mt-30 mt-md-50">
                            <div class="row flex-center">

                                <div class="col-md-4 col-lg-6 col-xl-4">
                                    <img src="img/team-member-1.jpg" width="420" height="397" class="scaling-image" alt="">
                                    <h5 class="text-semi-bold mt-30">Harry Richardson</h5>
                                    <p class="second-font text-primary mt-10">Chief Cook</p>
                                    <p class="mt-10 pr-md-20">Dry saying be firmament won't abundantly Man one his, fourth creature rule spirit male brought light, face creature. Thing bearing. Our. Moveth given behold she'd i whose herb open without.</p>
                                    <ul class="list-inline">
                                        <li><a href="#" class="icon icon-md fa fa-facebook"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-twitter"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-linkedin"></a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-6 col-xl-4 mt-30 mt-md-0">
                                    <img src="img/team-member-2.jpg" width="420" height="397" class="scaling-image" alt="">
                                    <h5 class="text-semi-bold mt-30">Olivia Stephens</h5>
                                    <p class="second-font text-primary mt-10">Deserts</p>
                                    <p class="mt-10 pr-md-20">The gathering beginning make bearing called fourth one seed have called and let itself to said land saw image great make evening you it evening fourth, firmament brought were created.</p>
                                    <ul class="list-inline">
                                        <li><a href="#" class="icon icon-md fa fa-facebook"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-twitter"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-linkedin"></a></li>
                                    </ul>
                                </div>

                                <div class="col-md-4 col-lg-6 col-xl-4 mt-30 mt-md-0 mt-lg-30 mt-xl-0">
                                    <img src="img/team-member-3.jpg" width="420" height="397" class="scaling-image" alt="">
                                    <h5 class="text-semi-bold mt-30">Ethan Coleman</h5>
                                    <p class="second-font text-primary mt-10">Exotic Dishes</p>
                                    <p class="mt-10 pr-md-20">Form so, their living. Was were the female void said. Don't she'd saying heaven face good called dominion, there greater from. You shall thing light. You'll creepeth fowl morning wherein.</p>
                                    <ul class="list-inline">
                                        <li><a href="#" class="icon icon-md fa fa-facebook"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-twitter"></a></li>
                                        <li><a href="#" class="icon icon-md fa fa-linkedin"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--========== CONTACT US ==========-->
            <section class="section section-content " id="section6">
                <div class="container container-big text-md-left">
                    <div class="row flex-center flex-xl-left">
                        <h3 class="col-xs-10">Contact Us</h3>
                        <div class="col-xl-12 mt-30 mt-md-50">
                            <div class="row flex-center flex-xl-left">
                                <div class="col-md-6 col-xl-5">
                                    <img src="img/contact-img.jpg" width="571" height="402" alt="">
                                </div>

                                <!-- Contact Form -->
                                <div class="col-sm-10 col-md-6 col-lg-5 mt-30 mt-md-0">
                                    <h6 class="text-medium">Get in touch</h6>
                                    <form class="contact-form js-form" method="POST" action="php/contact.php">
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <input autocomplete="off" required type="text" name="name" class="form-control" placeholder="Name">
                                            </div>
                                            <div class="form-group col-md-12 mt-20 mt-md-30">
                                                <input autocomplete="off" required type="email" name="email" class="form-control" placeholder="Email">
                                            </div>
                                            <div class="form-group col-md-12 mt-20 mt-md-30">
                                                <textarea required name="message" class="form-control" placeholder="Message"></textarea>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-primary mt-20">CONTACT US</button>
                                    </form>
                                </div>
                            </div>
                            <div class="contact-data row">
                                <div class="col-xl-10">
                                    <div class="row">
                                        <div class="col-md-3 col-lg-3 col-xl-4">
                                            <p class="second-font text-bold text-primary ls-0">ADDRESS</p>
                                            <p class="mt-10 mt-md-20">
                                                Nicholas Desmond Simon Graham <br>
                                                PO Box 1230 <br>
                                                Georgetown <br>
                                                Grand Cayman <br>
                                                CAYMAN ISLANDS - UK <br>
                                            </p>
                                        </div>
                                        <div class="col-md-4 col-lg-5 col-xl-4 mt-30 mt-md-0">
                                            <p class="second-font text-bold text-primary ls-0">PHONES</p>
                                            <p class="mt-10 mt-md-20 show-lg-flex flex-justify pr-lg-100"><span class="text-bold">Administration:</span> <a href="#">+(099) 45-33-687</a></p>
                                            <p class="mt-10 show-lg-flex flex-justify pr-lg-100"><span class="text-bold">Chief Cook:</span> <a href="#">+(099) 64-85-879</a></p>
                                            <p class="mt-10 show-lg-flex flex-justify pr-lg-100"><span class="text-bold">Reserve a table:</span> <a href="#">+(099) 56-98-147</a></p>
                                        </div>
                                        <div class="col-md-5 col-lg-4 mt-30 mt-md-0">
                                            <p class="second-font text-bold text-primary ls-0">EMAILS</p>
                                            <p class="mt-10 mt-md-20 show-md-flex flex-justify pr-md-20"><span class="text-bold">Administration:</span> <a href="#">Admin@email.com</a></p>
                                            <p class="mt-10 show-md-flex flex-justify pr-md-20"><span class="text-bold">Reserve a table:</span> <a href="#">Mangocafe@email.com</a></p>
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

</body>
</html>