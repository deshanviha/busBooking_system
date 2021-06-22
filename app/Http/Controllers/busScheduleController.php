<?php

namespace App\Http\Controllers;

use App\Models\busSchedules;
use Illuminate\Http\Request;

class busScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return busSchedules::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'bus_route_id'=>'exists:App\Models\busRoutes,id',
            'direction'=>'required',
            'start_timestamp'=>'date_format:"H:i"|required',
            'end_timestamp'=>'date_format:"H:i"|required'

        ]);
        return busSchedules::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return busSchedules::find($id);
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
        $scheduleUpdate = busSchedules::find($id);
        $scheduleUpdate->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return busSchedules::destroy($id);
    }
}
