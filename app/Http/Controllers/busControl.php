<?php

namespace App\Http\Controllers;

use App\Models\superAdmin;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Buses;
use Illuminate\Support\Facades\DB;

class busControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Buses::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {


       $checkid = DB::table('personal_access_tokens')->where('id', $id)->value('name');

        $request ->validate([
           'name' => 'required',
           'type' => 'required',
            'vehicle_number' => 'required'
        ]);

         return Buses::create($request->all());

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Buses::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {

        $bus = Buses::find($id);
        $bus -> update ($request->all());

        if ($request->user()->cannot('update', $id)) {
            abort(403);
        }



        return $bus;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Buses::destroy($id);
    }

    /**
     * Search bus.
     *
     * @param  str  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Buses::where('name', 'like' ,'%'.$name.'%')->get();
    }




}
