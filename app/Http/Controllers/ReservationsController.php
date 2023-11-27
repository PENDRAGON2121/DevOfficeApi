<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    //

    public function store(Request $request)
    {
        //
        $inputs["office_id"] = $request->office_id;
        $inputs["user_id"] = $request->user_id;
        $inputs["check_in"] = $request->check_in;
        $inputs["check_out"] = $request->check_out;

        $Reservation = Reservation::create($request->all());
        return $Reservation;
    }

}
