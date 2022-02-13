<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WeekRequest;
use App\Models\User;
use App\Models\Week;
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
        return view('admin.curriculum', compact('user', 'weeks'));
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
