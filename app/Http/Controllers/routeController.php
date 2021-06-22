<?php

namespace App\Http\Controllers;

use App\Models\routes;
use Illuminate\Http\Request;

class routeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return routes::aLL();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $validateData= $request->validate([

            'node_one'=>'required',
            'node_two'=>'required',
            'route_number'=>'required',
            'distance'=>'required|ends_with:km',
            'time'=>'required'


        ]);


        return routes::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return routes::find($id);
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



        $route = routes::find($id);
        $route -> update ($request->all());

        return $route;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return routes::destroy($id);
    }

    /**
     * Search bus.
     *
     * @param  str  $route_num
     * @return \Illuminate\Http\Response
     */
    public function search($route_num)
    {
        return routes::where('route_number', 'like' ,'%'.$route_num.'%')->get();
    }


}
