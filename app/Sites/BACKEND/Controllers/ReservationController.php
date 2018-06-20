<?php

namespace App\Sites\BACKEND\Controllers;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Table;
use App\Models\Caffe;

class ReservationController extends Controller
{
    public function index(){
        $reservations=Reservation::all();
        $caffes= Caffe::all();
        $tables=Table::all();
        return view('reservation.reservation')->withReservations($reservations)->withCaffes($caffes)->withTables($tables);
    }
    public function show($id)
    {
        $reservations=Reservation::all();
        $caffe = Caffe::find($id);
        $tables = Table::all();

        return view('reservation.reservation-caffe')->withCaffe($caffe)->withReservations($reservations)->withTables($tables);
    }
    public function confirm($reservation_id)
    {
        $reservation = Reservation::find($reservation_id);
        $table= Table::find($reservation->fk_for_table);
        $table->is_reserved= true;
        $reservation->status = true;
        $reservation->save();
        $table->save();

        return redirect()->back()->with('success', 'Rezervacija potvrdjena.');

    }
    public function destroy($reservation_id)
    {
        Reservation::find($reservation_id)->delete();
        return redirect()->back()->with('success', 'Rezervacija obrisana.');
    }
}
