<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeekRequest;
use App\Http\Requests\StartDateOfWeekRequest;
use App\Models\User;
use App\Models\Week;
use App\Models\Generation;
use App\Models\StartDateOfWeek;
use Illuminate\Support\Facades\Auth;

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
        $weeks = Week::all();
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
        return view('admin.weekCreate');
    }

    public function week_store(WeekRequest $request)
    {
        $week = new Week;
        $week->week_number = $request->week_number;
        $week->phase_number = $request->phase_number;
        $week->save();
        return redirect(route('curriculum'));
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
        return view('admin.weekEdit', compact('week'));
    }

    public function week_update(WeekRequest $request)
    {
        $week = Week::find($request->id);
        $week->week_number = $request->week_number;
        $week->phase_number = $request->phase_number;
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
