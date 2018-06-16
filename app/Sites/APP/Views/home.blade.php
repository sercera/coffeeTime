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
<body style="background-color: orange;">

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

<div style="height: 30px;">

</div>
<h1 class="default-font text-bold letter-spacing-30">coffeeTime</h1>
<br />
<br />

@foreach($caffes as $caffe)
    <div id="{{$caffe->caffe_id}}" style="width: 350px; float:left; margin:25px;" >
        <h4> {{$caffe->name}}</h4>
        <h8> </h8>
{{--        <img style="height: 300px; width: 300px;"  alt="{{$caffe->name}}"class="img-circle" href="www.coffeetime.com/caffe/show/{{$caffe->caffe_id}} "src="{{asset('images/caffe_images/' . $caffe->image)}}" />--}}
        <a href="{{route('show',$caffe->caffe_id)}}"><img src="{{asset('images/caffe_images/' . $caffe->image)}}" style="height: 300px; width: 300px; margin:20px;"  alt="{{$caffe->name}}" class="img-circle" ></a>
    </div>
@endforeach


<script src="{{asset('FRONTEND/site/js/minified.js')}}"></script>
<script src="{{asset('FRONTEND/site/js/main.js')}}"></script>
</body>
</html>