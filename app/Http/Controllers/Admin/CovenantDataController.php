<?php

namespace App\Http\Controllers\Admin;

use App\Models\CovenantData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CovenantDataController extends Controller
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
        $covenants = CovenantData::get();
        return view('admin.pages.covenantData.create', compact('covenants'));
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
        CovenantData::create([
            'name' =>$request->name,
            'address' =>$request->address,
            'tel' =>$request->tel,
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
        $covenants = CovenantData::findOrFail($id);
        return view('admin.pages.covenantData.edit', compact('covenants'));
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
        $covenants = CovenantData::findOrFail($id);
        $covenants->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('covenantData.create')->with(['success' => " تم  بنجاح"]);
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
        $covenants = CovenantData::findOrFail($id);
        $covenants->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
