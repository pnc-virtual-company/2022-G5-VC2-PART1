<?php

namespace App\Http\Controllers;


use App\Models\Student;
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
        return student::with('leave')->get();
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
<<<<<<< HEAD
        // $token=$student->createToken('student-token')->plainTextToken;
        return response()->json(['token' => "ss"]);

=======
>>>>>>> 0430ea6a9c991eb8004d5ff564eb7bc67c864be0
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
        
         $student = student::findOrFail($id);
         $student -> password = Hash::make($request->password);
         $student->save();

    }
    public function updatePhoto(Request $request, $id)
    {

         $student = student::findOrFail($id);
         $student -> profile_image = $request->profile_image;
         $student->save();
         return response()->json(['sms'=>$student]);

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
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request) {
<<<<<<< HEAD
        $student = student::where('email', $request->email)->first();
        if(!$student || !Hash::check($request->password, $student->password)){
            return response()->json(['sms'=>false]);
        }
        $token = $student->createToken('my-token')->plainTextToken;
        return response()->json(['sms'=>$token]);
       
=======
<<<<<<< HEAD
        $student = student::where('email',$request->email)->first();
        if (!Hash::check ($request->password,$student->password)) {
            return response()->json(['sms'=>'invalid']);
        }
        $token = $student->createToken('token_student')->plainTextToken;
        return response()->json(['sms'=>'Successfully','token'=>$token]);
=======
        $user = student::where('email',$request->email)->first();
        if (!$user || !Hash::check ($request->password,$user->password)) {
        $token = $user->createToken('token_name')->plainTextToken;
        return response()->json(['sms'=>'Success fully','token'=>$token]);
        }
>>>>>>> a8b4da75bd7756b75adc8f51f3da2cbf62c27243
>>>>>>> 0430ea6a9c991eb8004d5ff564eb7bc67c864be0
    }
}

