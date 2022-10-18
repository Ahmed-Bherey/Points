<?php

namespace App\Http\Controllers\Admin;

use App\Models\Reward;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RewardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $staffs = StaffData::get();
        $rewards = Reward::get();
        return view('admin.pages.Rewards.create' , compact('rewards' , 'staffs'));
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
        Reward::create([
            'staff_id' => $request->staff_id,
            'value' => $request->value,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
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
        $staffs = StaffData::get();
        $rewards = Reward::findOrFail($id);
        return view('admin.pages.Rewards.edit' , compact('rewards' , 'staffs'));
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
        $rewards = Reward::findOrFail($id);
        $rewards->update([
            'staff_id' => $request->staff_id,
            'value' => $request->value,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('rewards.create')->with(['success' => " تم  بنجاح"]);
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
        $rewards = Reward::findOrFail($id);
        $rewards->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
