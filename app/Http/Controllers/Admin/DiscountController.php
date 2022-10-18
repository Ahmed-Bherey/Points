<?php

namespace App\Http\Controllers\Admin;

use App\Models\Discount;
use App\Models\StaffData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountController extends Controller
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
        $discounts = Discount::get();
        return view('admin.pages.Discounts.create' , compact('discounts' , 'staffs'));
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
        Discount::create([
            'staff_id' =>$request->staff_id,
            'discount_amount' =>$request->discount_amount,
            'value_per_day' =>$request->value_per_day,
            'date' =>$request->date,
            'notes' =>$request->notes,
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
        $discounts = Discount::findOrFail($id);
        return view('admin.pages.Discounts.edit' , compact('discounts' , 'staffs'));
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
        $discounts = Discount::findOrFail($id);
        $discounts->update([
            'staff_id' =>$request->staff_id,
            'discount_amount' =>$request->discount_amount,
            'value_per_day' =>$request->value_per_day,
            'date' =>$request->date,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('discounts.create')->with(['success' => " تم  بنجاح"]);
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
        $discounts = Discount::findOrFail($id);
        $discounts->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
