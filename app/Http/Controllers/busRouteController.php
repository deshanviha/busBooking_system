<?php

namespace App\Http\Controllers;

use App\Models\busRoutes;
use Illuminate\Http\Request;

class busRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return busRoutes::all();
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
            'bus_id'=>'exists:App\Models\Buses,id',
            'route_id'=>'exists:App\Models\routes,id',
            'status'=>'required'
        ]);
        return busRoutes::create($request-> all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return busRoutes::find($id);
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
        $request->validate([
            'bus_id'=>'exists:App\Models\Buses,id',
            'route_id'=>'exists:App\Models\routes,id'
        ]);


        $busroutes = busRoutes::find($id);
        $busroutes->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return busRoutes::destroy($id);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search($id)
    {
        return busRoutes::where('id', 'like' ,'%'.$id.'%')->get();
    }


}
