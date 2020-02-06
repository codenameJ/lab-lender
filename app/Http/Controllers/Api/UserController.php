<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\user;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
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
            'Name'=>'required',
            'Email'=>'required',
            'Phone'=>'required',
            'Password'=>'required',
            'Activation'=>'required',
         ]);
         $user = User::create([
             'Name'=> $request->Name,
             'Email'=> $request->Email,
             'Phone'=> $request->Phone,
             'Password'=> bcrypt($request->Password),
             'Activation'=> $request->Activation,
         ]);
 
         return response(['message'=>'User Added', 'user'=>$user]);
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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'Name'=>'required',
            'Email'=>'required',
            'Phone'=>'required',
            'Activation'=>'required',
         ]);
         $user = User::create([
             'Name'=> $request->Name,
             'Email'=> $request->Email,
             'Phone'=> $request->Phone,
             'Activation'=> $request->Activation,
         ]);
 
         return response(['message'=>'User Updated', 'user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::destroy($id);
    }
}
