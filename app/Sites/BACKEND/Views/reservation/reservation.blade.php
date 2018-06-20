@extends('layout')

@section('stylesheets')
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('active-menu')
    @include('active-menu')
@endsection

@section('content')
    @include('error')

    <div class="panel">
        <div class="panel-heading">
            <div class="col-lg-5">
            </div>
            <div class="col-lg-7">
                <h4 class="panel-title">Lista svih rezervacija</h4>
            </div>
        </div>
        <br>
        <div class="panel-body">
            <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
    <thead class="bg-primary">
    <tr>
        <td>Id stola</td>
        <td>Ime kafica</td>
        <td>Broj stola</td>
        <td>Status</td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @if(count($reservations) > 0)
        @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->fk_for_table}}</td>
                @foreach($caffes as $caffe)
                    @if($reservation->fk_for_caffe == $caffe->caffe_id)
                <td>{{$caffe->name}}</td>
                    @endif
                @endforeach


                @foreach($tables as $table)
                    @if($reservation->fk_for_table == $table->table_id)
                        <td>{{$table->table_number}}</td>
                        @endif
                        @endforeach
                <td>
                    @if($reservation->status==0)
                        <span class="label label-danger">Još uvek nije potvrdjeno</span>
                    @else
                        <span class="label label-info">Potvrdjeno</span>
                    @endif
                </td>
                <td>
                    {!! Form::open(['route' => ['reservation.destroy', $reservation->reservation_id],'method' => 'DELETE']) !!}

                    {!! Form::submit('Izbriši', ['class' => 'btn btn-danger btn-sm', 'style' => 'float:left']) !!}



                    {!! Form::close() !!}
                {{--</td>--}}
                {{--<td>--}}
                    @if($reservation->status==false)
                    {!! Form::open(['route' => ['reservation.status', $reservation->reservation_id],'method' => 'POST']) !!}

                    {!! Form::submit('Potvrdi', ['class' => 'btn btn-info btn-sm', 'style' => 'margin-left:10px']) !!}



                    {!! Form::close() !!}
                        @endif
                </td>
            </tr>
        @endforeach
    @endif


    </tbody>
</table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    @endsection
{!! Toastr::message() !!}