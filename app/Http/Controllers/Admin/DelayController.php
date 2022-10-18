<?php

namespace App\Http\Controllers\Admin;

use App\Models\Delay;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DelayController extends Controller
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
        $delaies = Delay::get();
        return view('admin.pages.Delay.create' , compact('delaies' , 'staffs'));
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
        Delay::create([
            'staff_id' => $request->staff_id,
            'hours' => $request->hours,
            'mints' => $request->mints,
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
        $delaies = Delay::findOrFail($id);
        return view('admin.pages.Delay.edit' , compact('delaies' , 'staffs'));
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
        $delaies = Delay::findOrFail($id);
        $delaies->update([
            'staff_id' => $request->staff_id,
            'hours' => $request->hours,
            'mints' => $request->mints,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('delay.create')->with(['success' => " تم  بنجاح"]);
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
        $delaies = Delay::findOrFail($id);
        $delaies->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
