<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\ProgressOfAssignment;
use App\Models\Reflection;
use App\Models\Week;
use App\Models\StudyTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $weeks = Week::all();
        $teaching_materials = Assignment::where('assignment_type_id', 1)->get();
        return view('generalUser.index', compact('user', 'weeks', 'teaching_materials'));
    }

    public function assignment_check(Request $request)
    {
        $user_id = Auth::user()->id;
        $assignment_id = $request->assignment_id;
        $is_done = ($request->is_done == 'true') ? 1 : 0;
        $progress_of_assignment = ProgressOfAssignment::firstOrNew(['user_id' => $user_id, 'assignment_id' => $assignment_id]);
        $progress_of_assignment->user_id = $user_id;
        $progress_of_assignment->assignment_id = $assignment_id;
        $progress_of_assignment->is_done = $is_done;
        $progress_of_assignment->save();
        return redirect('/reflection');
    }

    public function reflection_post(Request $request)
    {
        $user_id = Auth::user()->id;
        $week = $request->week;
        $reflection_step = $request->reflection_step;
        $reflection_type_id = $request->reflection_type;
        $detail = $request->detail;
        $reflection = Reflection::firstOrNew(['user_id' => $user_id, 'week' => $week, 'reflection_type_id' => $reflection_type_id, 'reflection_step' => $reflection_step]);
        $reflection->user_id = $user_id;
        $reflection->week = $week;
        $reflection->reflection_step = $reflection_step;
        $reflection->reflection_type_id = $reflection_type_id;
        $reflection->detail = $detail;
        $reflection->save();
        return redirect('/reflection');
    }

    public function study_time(Request $request)
    {
        $user_id = Auth::user()->id;
        $week = $request->week;
        $study_time_type_id = $request->study_time_type;
        $study_time = StudyTime::firstOrNew(['user_id' => $user_id, 'week' => $week, 'study_time_type_id' => $study_time_type_id]);
        $study_time->user_id = $user_id;
        $study_time->week = $week;
        $study_time->study_time_type_id = $study_time_type_id;
        $study_time->study_time = $request->study_time;
        $study_time->save();
        return redirect('/reflection');
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
        //
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
