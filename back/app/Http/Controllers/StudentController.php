<?php

namespace App\Http\Controllers;


use App\Models\student;
Use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return student::all();
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
        $student = new student();
        $student -> first_name = $request->first_name;
        $student -> last_name = $request->last_name;
        $student -> gender = $request->gender;
        $student -> batch = $request->batch;
        $student -> email = $request->email;
        $student -> password = Hash::make($request->password);
        $student -> phone = $request->phone;
        $student -> profile_image = $request->profile_image;
        $student -> admin_id = $request->admin_id;
        $student->save();
        $token=$student->createToken('student-token')->plainTextToken;
        return response()->json(['token' => $token]);

    }

    /**
     * Display the specified resource.
     
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return student::with('leave')->where('id',$id)->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //
         $student = student::findOrFail($id);
         $student -> first_name = $request->first_name;
         $student -> last_name = $request->last_name;
         $student -> gender = $request->gender;
         $student -> batch = $request->batch;
         $student -> email = $request->email;
         $student -> password = Hash::make($request->password);
         $student -> phone = $request->phone;
         $student -> profile_image = $request->profile_image;
         $student -> admin_id = $request->admin_id;
         $student->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return student::destroy($id);
    }

<<<<<<< HEAD
    // public function login(Request $request) {
    //     $user = student::where('email',$request->email)->first();
    //     if (!$user || !Hash::check ($request->password,$user->password)) {
    //         return response()->json(['sms'=>'invalid']);
    //     } 
    //     $token = $user->createToken('token_name')->plainTextToken;
    //     return response()->json(['sms'=>'Success fully','token'=>$token]);
    // }
=======
    public function login(Request $request) {
        $user = student::only('email','password')->first();
        if (!Hash::check ($request->password,$user->password)) {
            return response()->json(['sms'=>'invalid']);
        } 
        $token = $user->createToken('token_student')->plainTextToken;
        return response()->json(['sms'=>'Success fully','token'=>$token]);
    }
>>>>>>> 22f0228576bc1cf020f3e73d86c6c873af7a7f10
}
