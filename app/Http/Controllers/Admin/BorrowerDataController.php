<?php

namespace App\Http\Controllers\Admin;

use App\Models\BorrowerData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowerDataController extends Controller
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
        $borrowersData = BorrowerData::get();
        return view('admin.pages.BorrowerData.create', compact('borrowersData'));
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
        BorrowerData::create([
            'name' => $request->name,
            'address' => $request->address,
            'tel' => $request->tel,
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
        $borrowersData = BorrowerData::findOrFail($id);
        return view('admin.pages.BorrowerData.edit', compact('borrowersData'));
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
        $borrowersData = BorrowerData::findOrFail($id);
        $borrowersData->update([
            'name' => $request->name,
            'address' => $request->address,
            'tel' => $request->tel,
            'notes' => $request->notes,
        ]);
        return redirect()->route('borrowerData.create')->with(['success' => " تم  بنجاح"]);
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
        $borrowersData = BorrowerData::findOrFail($id);
        $borrowersData->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
