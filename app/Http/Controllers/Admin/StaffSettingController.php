<?php

namespace App\Http\Controllers\Admin;

use App\Models\StaffData;
use App\Models\StaffSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffSettingController extends Controller
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
        $staffSettings = StaffSetting::get();
        return view('admin.pages.StaffSettings.create', compact('staffSettings' , 'staffs'));
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
        StaffSetting::create([
            'staff_id' => $request->staff_id,
            'work_day_num' => $request->work_day_num,
            'main_holiday' => $request->main_holiday,
            'sub_holiday' => $request->sub_holiday,
            'attendance_time' => $request->attendance_time,
            'leaving_time' => $request->leaving_time,
            'attendance_leaving_duration' => $request->attendance_leaving_duration,
            'normal_holiday_num' => $request->normal_holiday_num,
            'casual_holiday_num' => $request->casual_holiday_num,
            'work_hours' => $request->work_hours,
            'absence_day' => $request->absence_day,
            'delay_hour' => $request->delay_hour,
            'extra_hour' => $request->extra_hour,
            'basedOnNumOfMonthDay' => $request->basedOnNumOfMonthDay,
            'cost_type' => $request->cost_type,
            'extra_fixed_amount' => $request->extra_fixed_amount,
            'basedOnFixedAmount' => $request->basedOnFixedAmount,
            'delay_fixed_amount' => $request->delay_fixed_amount,
            'cost_time' => $request->cost_time,
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
        $staffSettings = StaffSetting::get();
        return view('admin.pages.StaffSettings.edit', compact('staffSettings' , 'staffs'));
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
        $staffSettings = StaffSetting::findOrFail($id);
        $staffSettings->update([
            'staff_id' => $request->staff_id,
            'work_day_num' => $request->work_day_num,
            'main_holiday' => $request->main_holiday,
            'sub_holiday' => $request->sub_holiday,
            'attendance_time' => $request->attendance_time,
            'leaving_time' => $request->leaving_time,
            'attendance_leaving_duration' => $request->attendance_leaving_duration,
            'normal_holiday_num' => $request->normal_holiday_num,
            'casual_holiday_num' => $request->casual_holiday_num,
            'work_hours' => $request->work_hours,
            'absence_day' => $request->absence_day,
            'delay_hour' => $request->delay_hour,
            'extra_hour' => $request->extra_hour,
            'basedOnNumOfMonthDay' => $request->basedOnNumOfMonthDay,
            'cost_type' => $request->cost_type,
            'extra_fixed_amount' => $request->extra_fixed_amount,
            'basedOnFixedAmount' => $request->basedOnFixedAmount,
            'delay_fixed_amount' => $request->delay_fixed_amount,
            'cost_time' => $request->cost_time,
        ]);
        return redirect()->route('staffSetting.create')->with(['success' => " تم  بنجاح"]);
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
        $staffSettings = StaffSetting::findOrFail($id);
        $staffSettings->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
