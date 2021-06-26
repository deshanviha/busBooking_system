<?php

namespace App\Http\Controllers;

use App\Models\busSeat;
use Illuminate\Http\Request;

class busSeatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return busSeat::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request ->validate([
            'bus_id' => 'exists:App\Models\Buses,id',
            'seat_number' => 'required',
            'price' => 'required'
        ]);
        return busSeat::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return busSeat::find($id);
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

        $request ->validate([
            'bus_id' => 'exists:App\Models\Buses,id',
        ]);


        $updateBusRoute = busSeat::find($id);
        $updateBusRoute-> update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return busSeat::destroy($id);
    }


    /**
     * Search seat.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        return busSeat::where('bus_id', 'like' ,'%'.$id.'%')->get();
    }
}
