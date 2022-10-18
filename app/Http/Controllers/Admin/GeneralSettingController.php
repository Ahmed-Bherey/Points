<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;

class GeneralSettingController extends Controller
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
        $generalSettings = GeneralSetting::get();
        return view('admin.pages.generalSetting.create', compact('generalSettings'));
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
        GeneralSetting::create([
            'working_days' =>$request->working_days,
            'main_holiday' =>$request->main_holiday,
            'sub_holiday' =>$request->sub_holiday,
            'attendance_time' =>$request->attendance_time,
            'leaveing_time' =>$request->leaveing_time,
            'attendance_leaving_duration' =>$request->attendance_leaving_duration,
            'work_hours' =>$request->work_hours,
            'absence_day' =>$request->absence_day,
            'delay_hour' =>$request->delay_hour,
            'extra_hour' =>$request->extra_hour,
            'basedOnNumOfMonthDay' =>$request->basedOnNumOfMonthDay,
            'cost_type' =>$request->cost_type,
            'basedOnFixedAmount' =>$request->basedOnFixedAmount,
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
        $generalSettings = GeneralSetting::findOrFail($id);
        return view('admin.pages.generalSetting.edit', compact('generalSettings'));
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
        $generalSettings = GeneralSetting::findOrFail($id);
        $generalSettings->update([
            'working_days' =>$request->working_days,
            'main_holiday' =>$request->main_holiday,
            'sub_holiday' =>$request->sub_holiday,
            'attendance_time' =>$request->attendance_time,
            'leaveing_time' =>$request->leaveing_time,
            'attendance_leaving_duration' =>$request->attendance_leaving_duration,
            'work_hours' =>$request->work_hours,
            'absence_day' =>$request->absence_day,
            'delay_hour' =>$request->delay_hour,
            'extra_hour' =>$request->extra_hour,
            'basedOnNumOfMonthDay' =>$request->basedOnNumOfMonthDay,
            'cost_type' =>$request->cost_type,
            'basedOnFixedAmount' =>$request->basedOnFixedAmount,
        ]);
        return redirect()->route('generalSetting.create')->with(['success' => " تم  بنجاح"]);
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
        $generalSettings = GeneralSetting::findOrFail($id);
        $generalSettings->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
