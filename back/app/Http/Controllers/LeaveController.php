<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return leave::all();

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
        $leave = $request->validate([
            'type' => 'required|String',
            'start_date' => 'required|Date',
            'end_date' => 'required|Date',
            'duration' => 'required|numeric',
            'cause' => 'String',
            'status' => 'String',
            'admin_id' => 'required|Integer',
            'student_id' => 'required|Integer',
        ]);
        leave::create($leave);
        // $leave->type = $request->type;
        // $leave->start_date = $request->start_date;
        // $leave->end_date = $request->end_date;
        // $leave->cause = $request->cause;
        // $leave->status = $request->status;
        // $leave->admin_id = $request->admin_id;
        // $leave->student_id = $request->student_id;
        // $leave->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\leave  $leave
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        //
    }
}
