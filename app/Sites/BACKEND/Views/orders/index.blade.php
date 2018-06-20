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
            <a href="{{url('orders')}}">
                <i class="fa fa-coffee"></i>
                Narudžbine
            </a>
        </li>
    </ol>
@include('orders.partial')

    {{-- <div class="col-md-2">
                             <button type="button" data-order=""
                                     class="btn btn-success submit-order">
                                 Naplati
                             </button>
                         </div>--}}




@endsection