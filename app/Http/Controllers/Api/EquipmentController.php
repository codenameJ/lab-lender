<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Equipment;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipments = Equipment::all();
        return response()->json($equipments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'Equip_id'=>'required',
            'Equip_Name'=>'required',
            'Equip_Num'=>'required',
            'Lab_id'=>'required',
         ]);
         $equipment = Equipment::create([
             'Equip_id'=> $request->Equip_id,
             'Equip_Name'=> $request->Equip_Name,
             'Equip_Num'=> $request->Equip_Num,
             'Lab_id'=> $request->Lab_id,
         ]);
 
         return response(['message'=>'Equipment Added', 'equipment'=>$equipment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipment $equipment)
    {
        $request->validate([
            'Equip_id'=>'required',
            'Equip_Name'=>'required',
            'Equip_Num'=>'required',
            'Lab_id'=>'required',
        ]);

        $equipment->update([
            'Equip_id'=> $request->Equip_id,
             'Equip_Name'=> $request->Equip_Name,
             'Equip_Num'=> $request->Equip_Num,
             'Lab_id'=> $request->Lab_id,
        ]);

        return response(['message'=>'User Updated', 'equipment'=>$equipment]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Equipment::destroy($id);
    }
}
