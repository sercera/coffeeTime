@extends('layout')


@section('content')
    @include('caffe.error');
    <h1>Kafići</h1>
    @if(count($caffes) > 0)
        @foreach($caffes as $caffe)
            <ul class="list-group">
                <li class="list-group-item">Naziv: {{$caffe->name}}</li>
                <li class="list-group-item">Adresa: {{$caffe->address}}</li>
                <li class="list-group-item">Grad: {{$caffe->city}}</li>
                <li class="list-group-item">Kratak opis: {{$caffe->description}}</li>
            </ul>
        @endforeach
    @endif
@endsection