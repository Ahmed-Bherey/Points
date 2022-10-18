<?php

namespace App\Http\Controllers\Admin;

use App\Models\Salary;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SalaryController extends Controller
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
        $salaries = Salary::get();
        return view('admin.pages.salaries.create' , compact('salaries' , 'staffs'));
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
        Salary::create([
            'staff_id' => $request->staff_id,
            'main' => $request->main,
            'loan' => $request->loan,
            'absent' => $request->absent,
            'absent_value' => $request->absent_value,
            'insurance' => $request->insurance,
            'hours' => $request->hours,
            'hours_value' => $request->hours_value,
            'delay' => $request->delay,
            'delay_value' => $request->delay_value,
            'net_salary' => $request->net_salary,
            'meal' => $request->meal,
            'transition' => $request->transition,
            'reward' => $request->reward,
            'discount' => $request->discount,
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
        $salaries = Salary::findOrFail($id);
        return view('admin.pages.salaries.edit' , compact('salaries' , 'staffs'));
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
        $salaries = Salary::findOrFail($id);
        $salaries->update([
            'staff_id' => $request->staff_id,
            'main' => $request->main,
            'loan' => $request->loan,
            'absent' => $request->absent,
            'absent_value' => $request->absent_value,
            'insurance' => $request->insurance,
            'hours' => $request->hours,
            'hours_value' => $request->hours_value,
            'delay' => $request->delay,
            'delay_value' => $request->delay_value,
            'net_salary' => $request->net_salary,
            'meal' => $request->meal,
            'transition' => $request->transition,
            'reward' => $request->reward,
            'discount' => $request->discount,
        ]);
        return redirect()->route('salary.create')->with(['success' => " تم  بنجاح"]);
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
        $salaries = Salary::findOrFail($id);
        $salaries->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
