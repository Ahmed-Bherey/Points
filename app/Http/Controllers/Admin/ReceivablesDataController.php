<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReceivablesData;
use Illuminate\Http\Request;

class ReceivablesDataController extends Controller
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
        $receivablesDatas = ReceivablesData::get();
        return view('admin.pages.receivablesData.create', compact('receivablesDatas'));
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
        ReceivablesData::create([
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
        $receivablesDatas = ReceivablesData::findOrFail($id);
        return view('admin.pages.receivablesData.edit', compact('receivablesDatas'));
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
        $receivablesDatas = ReceivablesData::findOrFail($id);
        $receivablesDatas->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('receivablesData.create')->with(['success' => " تم  بنجاح"]);
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
        $receivablesDatas = ReceivablesData::findOrFail($id);
        $receivablesDatas->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
