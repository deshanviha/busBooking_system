<?php

namespace App\Http\Controllers;

use App\Models\busScheduleBooking;
use App\Models\busSchedules;
use App\Models\busSeat;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class busScheduleBookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $seatId , $userId ,$scheduleId )
    {

//validate details
       $request->validate([

           'bus_seat_id'=>('exists\App\Models\busSeat,id'),
           'user_id'=>('exists\App\Models\User,id'),
           'bus_schedule_id'=>('exists\App\Models\busSchedules,id')

       ]);


        $busScheduleBooking = new busScheduleBooking();
//get seat id and price
        $seat=DB::table('bus_seats')->where('id', $seatId)->value('seat_number');
        $price=DB::table('bus_seats')->where('id', $seatId)->value('price');





        $busScheduleBooking -> bus_seat_id=$seatId;
        $busScheduleBooking -> user_id=$userId;
        $busScheduleBooking -> bus_schedule_id=$scheduleId;
       $busScheduleBooking -> seat_number=$seat;
       $busScheduleBooking -> price=$price;
       $busScheduleBooking -> status=$request->input('status');
       $busScheduleBooking -> save();


       return  response([

           'message'=>"Booking Successful"


        ], 401);



    }

    /**
     * Display the specified resource.
     *
     * @param  str  $user_id
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {

        $result= DB::table('bus_schedule_bookings')->select('*')->where('user_id', '=' ,$user_id)->get();
        return $result;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


    }

    //booking timeup

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        $check_time= DB::table('bus_schedule_bookings')->where('id', $id)->value('created_at');

        $current_time= now()->subHour(1);

        if($check_time<$current_time){






            return response([

                'message'=>"Can't cancel booking time up"

            ], 403);



        }else{

            return busScheduleBooking::destroy($id);



        }


    }
}
