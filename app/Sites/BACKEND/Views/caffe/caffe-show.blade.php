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
            <a href="{{url('caffe')}}">
                <i class="fa fa-coffee"></i>
                Lista svih kafića
            </a>
        </li>
        <li class="active">
                <i class="fa fa-coffee"></i>
                {{$caffe->name}}
        </li>
    </ol>
    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">{{$caffe->name}}</h4>
            </div>
        </div>

        <div class="panel-body">
            <p class="panel-body">
                Adresa: {{$caffe->address}} <br />
                Radno vreme: {{$caffe->work_hour_from}}-{{$caffe->work_hour_to}} <br />
                Broj telefona: {{$caffe->call_number}} <br />
                <img src="{{asset('images/caffe_images/' . $caffe->image)}}" /> <br />
                <br />
                {{$caffe->description}} <br />
            </p>
            <div class="panel-body">
                    <div class="table-responsive">
                        <div style="box-sizing: border-box;border: 2px solid #2C3468;border-radius: 5px;background-color: #fff;border: 2px solid #2C3468;border-radius: 5px;background-color: #fff;padding: 1em;color: #2C3468;display: grid;grid-template-columns: repeat(4, 1fr);grid-gap: 10px;">
                            @if(count($tables) > 0)
                                @foreach($tables as $table)
                                    @if($table->fk_for_caffe==$caffe->caffe_id)
                                    <div style="border: 2px solid #2C3468;border-radius: 5px; @if($table->is_reserved==0 && $table->is_taken==0 )
                                            background-color: #32cd32;
                                    @else
                                            background-color: #cd5c5c;
                                        @endif padding: 1em;color: #fff;"
                                         data-toggle="modal" data-target="#{{$table->table_id}}"
                                    >

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



                                    <!-- Classic Modal -->
                                            <div class="modal fade" id="{{$table->table_id}}" role="dialog">
                                            <div class="modal-dialog">

                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" >&times;</button>

                                                        <h4 class="modal-title">Sto broj {{$table->table_number}}</h4>
                                                    </div>
                                                    <div class="modal-body" style="height: 70px;">
                                                        <div>
                                                        {{--{!! Form::open(['route' => ['caffe.destroy', $caffe->caffe_id],'method' => 'DELETE']) !!}--}}

                                                        {{--{!! Form::submit('Dodaj narudžbinu', ['class' => 'btn btn-info pull-left', 'style' => 'margin-right: 10px']) !!}--}}

                                                        {{--{!! Form::close() !!}--}}
                                                            <a href="{{url('table/order/add/{$table_id}',$table['table_id'])}}"
                                                               class="edit btn btn-info pull-left" style="margin-right: 10px;" role="button">Dodaj narudžbinu</a>
                                                        </div>
                                                        <div>


                                                            @if($table->is_reserved==0)
                                                                {!! Form::open(['route' => ['reserve', $table->table_id],'method' => 'PUT']) !!}

                                                                {!! Form::submit('Rezervisi', ['class' => 'btn btn-warning pull-left', 'style' => 'margin-right: 10px']) !!}

                                                                {!! Form::close() !!}
                                                                {{--<a href="{{url('caffe/show',$table['fk_for_caffe'])}}"--}}
                                                                   {{--class="edit btn btn-warning pull-left" style="margin-right: 10px;" role="button">Rezerviši</a>--}}
                                                            @else
                                                                {!! Form::open(['route' => ['release', $table->table_id],'method' => 'PUT']) !!}

                                                                {!! Form::submit('Ukloni rezervaciju', ['class' => 'btn btn-warning pull-left', 'style' => 'margin-right: 10px']) !!}

                                                                {!! Form::close() !!}
                                                                {{--<a href="{{url('table/release',$table['table_id'])}}"--}}
                                                                   {{--class="edit btn btn-warning pull-left" role="button">Oslobodi</a>--}}
                                                            @endif

                                                        </div>
                                                        <div>
                                                        {{--{!! Form::open(['route' => ['caffe.destroy', $caffe->caffe_id],'method' => 'DELETE']) !!}--}}

                                                        {{--{!! Form::submit('Naplati račun', ['class' => 'btn btn-danger pull-right', 'style' => 'margin-right: 10px']) !!}--}}

                                                        {{--{!! Form::close() !!}--}}
                                                            <a href="{{url('table/...',$table['table_id'])}}"
                                                               class="edit btn btn-danger pull-right" style="margin-right: 10px;" role="button">Naplati račun</a>
                                                        </div>
                                                        {{--<button type="button" class="btn btn-info">Dodaj narudžbinu</button>--}}
                                                        {{--<button type="button" class="btn btn-warning">Rezervisi</button>--}}
                                                        {{--<button type="button" class="btn btn-danger pull-right">Naplati račun</button>--}}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Zatvori</button>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                    {{--</div>--}}
                                    {{--@endif--}}
                                @endforeach
                                    {{--@endif--}}
                            @endif
                        </div>

                        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead class="bg-primary">
                            <tr>
                                <td>Broj stola</td>
                                <td>Broj mesta za stolom</td>
                                <td>Kafić</td>
                                <td>Zauzet</td>
                                <td>Rezervisan</td>
                                <td></td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($tables) > 0)
                                @foreach($tables as $table)
                                    @if($table->fk_for_caffe==$caffe->caffe_id)
                                    <tr>
                                        <td>{{$table->table_number}}</td>
                                        <td>{{$table->table_spots}}</td>
                                        <td>{{$table->caffe->name}}</td>
                                        <td>
                                            @if($table->is_taken==0)
                                                Slobodan
                                            @else
                                                Zauzet
                                            @endif
                                        </td>
                                        <td>
                                            @if($table->is_reserved==0)
                                                Nije rezervisan
                                            @else
                                                Rezervisan
                                            @endif
                                        </td>
                                        <td style="width: 150px;">
                                            {!! Form::open(['route' => ['table.destroy', $table->table_id],'method' => 'DELETE']) !!}

                                            {!! Form::submit('Izbriši', ['class' => 'btn btn-danger pull-left', 'style' => 'margin-right: 10px']) !!}

                                            {!! Form::close() !!}
                                            <a href="{{url('table/edit',$table['table_id'])}}"
                                               class="edit btn btn-warning" role="button">Izmeni</a>
                                        </td>
                                    </tr>

                                    @endif
                                @endforeach
                            @endif

                            </tbody>
                        </table>



                    </div>
                </div>

        </div>
    </div>


@endsection