<?php

namespace App\Sites\APP\Controllers;

use App\Models\Reservation;
use App\Models\Caffe;
use App\Models\Table;
use App\Notifications\RepliedToReservation;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


class ReservationController extends AuthController
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function reserve(Request $request){



        $this->validate($request ,[
            'table_number' => 'required',
            ]);

        $reservation = new Reservation();

        $caffe= Caffe::find($request->input('caffe_id'));
        Auth::user()->notify(new RepliedToReservation($caffe));
//        Auth::user()->notify(new RepliedToReservation());
//        dd($stocic);
        $reservation->fk_for_table=$request->input('table_number');
        $reservation->fk_for_caffe=$request->input('caffe_id');
        $reservation->status=false;
        $reservation->save();

        Toastr::success('Zahtev za rezervaciju je poslat, molimo Vas da sačekate potvrdu rezervacije', 'Uspešno' , ["positionClass" => "toast-top-right"]);

        return redirect()->back();

    }
}
