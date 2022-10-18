<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReminderDue;
use Illuminate\Http\Request;

class ReminderDueController extends Controller
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
        $reminderDues = ReminderDue::get();
        return view('admin.pages.reminderDues.create', compact('reminderDues'));
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
        ReminderDue::create([
            'date1' =>$request->date1,
            'amount' =>$request->amount,
            'date2' =>$request->date2,
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
        $reminderDues = ReminderDue::findOrFail($id);
        return view('admin.pages.reminderDues.edit', compact('reminderDues'));
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
        $reminderDues = ReminderDue::findOrFail($id);
        $reminderDues->update([
            'date1' =>$request->date1,
            'amount' =>$request->amount,
            'date2' =>$request->date2,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('reminderDue.create')->with(['success' => " تم  بنجاح"]);
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
        $reminderDues = ReminderDue::findOrFail($id);
        $reminderDues->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
