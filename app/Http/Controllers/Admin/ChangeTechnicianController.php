<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technician;
use Illuminate\Http\Request;
use App\Models\ChangeTechnician;
use App\Http\Controllers\Controller;

class ChangeTechnicianController extends Controller
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
        $technicians = Technician::get();
        $changes = ChangeTechnician::get();
        return view('admin.pages.changeTechnician.create' , compact('changes' , 'technicians'));
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
        ChangeTechnician::create([
            'technicianFrom_id' => $request->technicianFrom_id,
            'technicianTo_id' => $request->technicianTo_id,
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
        $technicians = Technician::get();
        $changes = ChangeTechnician::findOrFail($id);
        return view('admin.pages.changeTechnician.edit' , compact('changes' , 'technicians'));
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
        $changes = ChangeTechnician::findOrFail($id);
        $changes->update([
            'technicianFrom_id' => $request->technicianFrom_id,
            'technicianTo_id' => $request->technicianTo_id,
        ]);
        return redirect()->route('changeTechnician.create')->with(['success' => " تم  بنجاح"]);
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
        $changes = ChangeTechnician::findOrFail($id);
        $changes->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
