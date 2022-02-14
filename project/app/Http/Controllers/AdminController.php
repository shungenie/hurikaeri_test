<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeekRequest;
use App\Http\Requests\StartDateOfWeekRequest;
use App\Http\Requests\AssignmentRequest;
use App\Models\User;
use App\Models\Week;
use App\Models\Generation;
use App\Models\StartDateOfWeek;
use App\Models\Assignment;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;

use App\Consts\ReflectionConsts;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $posse_members = User::all();
        return view('admin.index', compact('user', 'posse_members'));
    }

    public function curriculum()
    {
        $user = Auth::user();
        $weeks = Week::orderBy('week_number')->get();
        $generations = Generation::where('is_graduated', false)->get();
        return view('admin.curriculum', compact('user', 'weeks', 'generations'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function week_create()
    {
        $courses = Course::all();
        return view('admin.weekCreate', compact('courses'));
    }

    public function week_store(WeekRequest $request)
    {
        $week = new Week;
        $week->week_number = $request->week_number;
        $week->course_id = $request->course_id;
        $week->save();
        return redirect(route('curriculum'));
    }

    public function teaching_material_create($id)
    {
        $week = Week::find($id);
        return view('admin.teachingMaterialCreate', compact('week'));
    }

    public function teaching_material_store(AssignmentRequest $request)
    {
        $assignment = new Assignment;
        $assignment->week_id = $request->week_id;
        $assignment->detail = $request->detail;
        $assignment->assignment_type_id = ReflectionConsts::TEACHING_MATERIAL;
        $assignment->save();
        return redirect(route('teaching_material_create', ['id' => $request->week_id]));
    }

    public function posse_assignments_create($id)
    {
        $week = Week::find($id);
        return view('admin.posseAssignmentCreate', compact('week'));
    }

    public function posse_assignments_store(AssignmentRequest $request)
    {
        $assignment = new Assignment;
        $assignment->week_id = $request->week_id;
        $assignment->detail = $request->detail;
        $assignment->assignment_type_id = ReflectionConsts::POSSE_ASSIGNMENT;
        $assignment->save();
        return redirect(route('posse_assignments_create', ['id' => $request->week_id]));
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

    public function week_edit($id)
    {
        $week = Week::find($id);
        $courses = Course::all();
        return view('admin.weekEdit', compact('week', 'courses'));
    }

    public function week_update(WeekRequest $request)
    {
        $week = Week::find($request->id);
        $week->week_number = $request->week_number;
        $week->course_id = $request->course_id;
        $week->save();
        return redirect(route('curriculum'));
    }

    public function week_start_edit($id)
    {
        $week = Week::find($id);
        $generations = Generation::where('is_graduated', false)->get();
        return view('admin.weekStartEdit', compact('week', 'generations'));
    }

    public function week_start_update(StartDateOfWeekRequest $request)
    {
        $start_date_of_week = StartDateOfWeek::firstOrNew(['generation_id' => $request->generation_id, 'week_id' => $request->week_id]);
        $start_date_of_week->week_id = $request->week_id;
        $start_date_of_week->generation_id = $request->generation_id;
        $start_date_of_week->start_date = $request->start_date;
        $start_date_of_week->save();
        return redirect(route('week_start_edit', ['id' => $request->id]));
    }

    public function teaching_material_edit($id)
    {
        $teaching_material = Assignment::find($id);
        return view('admin.teachingMaterialEdit', compact('teaching_material'));
    }

    public function teaching_material_update(AssignmentRequest $request)
    {
        $assignment = Assignment::find($request->id);
        $assignment->detail = $request->detail;
        $assignment->save();
        return redirect(route('teaching_material_create', ['id' => $request->week_id]));
    }

    public function teaching_material_destroy(Request $request, $id)
    {
        Assignment::find($id)->delete();
        return redirect(route('teaching_material_create', ['id' => $request->week_id]));
    }

    public function posse_assignments_edit($id)
    {
        $posse_assignments = Assignment::find($id);
        return view('admin.posseAssignmentEdit', compact('posse_assignments'));
    }

    public function posse_assignments_update(AssignmentRequest $request)
    {
        $assignment = Assignment::find($request->id);
        $assignment->detail = $request->detail;
        $assignment->save();
        return redirect(route('posse_assignments_create', ['id' => $request->week_id]));
    }

    public function posse_assignments_destroy(Request $request, $id)
    {
        Assignment::find($id)->delete();
        return redirect(route('posse_assignments_create', ['id' => $request->week_id]));
    }
}
