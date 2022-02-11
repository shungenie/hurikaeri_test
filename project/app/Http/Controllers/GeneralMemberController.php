<?php

namespace App\Http\Controllers;

use App\Models\TeachingMaterial;
use App\Models\ProgressOfTeachingMaterial;
use App\Models\PersonalityReflection;
use App\Models\Week;
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
        $teaching_materials = TeachingMaterial::all();
        return view('generalUser.index', compact('user', 'weeks', 'teaching_materials'));
    }

    public function reflection_check(Request $request)
    {
        $user_id = Auth::user()->id;
        $teaching_material_id = $request->teaching_material_id;
        $is_done = ($request->is_done == 'true') ? 1 : 0;
        $progress_of_teaching_material = ProgressOfTeachingMaterial::firstOrNew(['user_id' => $user_id, 'teaching_material_id' => $teaching_material_id]);
        $progress_of_teaching_material->user_id = $user_id;
        $progress_of_teaching_material->teaching_material_id = $teaching_material_id;
        $progress_of_teaching_material->is_done = $is_done;
        $progress_of_teaching_material->save();
        return redirect('/reflection');
    }

    public function personality_reflection_post(Request $request)
    {
        $user_id = Auth::user()->id;
        $week = $request->week;
        $reflection_step = $request->reflection_step;
        $detail = $request->detail;
        $progress_of_teaching_material = PersonalityReflection::firstOrNew(['user_id' => $user_id, 'week' => $week, 'reflection_step' => $reflection_step]);
        $progress_of_teaching_material->user_id = $user_id;
        $progress_of_teaching_material->week = $week;
        $progress_of_teaching_material->reflection_step = $reflection_step;
        $progress_of_teaching_material->detail = $detail;
        $progress_of_teaching_material->save();
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
