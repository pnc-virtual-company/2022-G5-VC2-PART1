<?php

namespace App\Http\Controllers;

use App\Models\Admin;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Admin::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $admin = new Admin();
        $admin -> first_name = $request->first_name;
        $admin -> last_name = $request->last_name;
        $admin -> email = $request->email;
        $admin -> password = Hash::make($request->password);
        $admin -> age = $request->age;
        $admin -> profile_image = $request->profile_image;
        $admin->save();
        $token=$admin->createToken('my-token')->plainTextToken;
        return response()->json(['token'=>$token]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
    public function login(Request $request) {
        $user = Admin::where('email',"$request->email")->first();
        if (!$user || Hash::check ($user->password,$request->password)) {
            return response()->json(['sms'=>'invalid']);
        } 
        $token = $user->createToken('token_name')->plainTextToken;
        return response()->json(['sms'=>'successed','token'=>$token]);
    }
}
