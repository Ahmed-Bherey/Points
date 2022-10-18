<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use App\Models\AddTreasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddTreasuryController extends Controller
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
        $treasuries = Treasury::get();
        $addTreasuries = AddTreasury::get();
        return view('admin.pages.addTreasury.create', compact('addTreasuries' , 'treasuries'));
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
        AddTreasury::create([
            'name' => $request->name,
            'treasury_id' => $request->treasury_id,
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
        $treasuries = Treasury::get();
        $addTreasuries = AddTreasury::findOrFail($id);
        return view('admin.pages.addTreasury.edit', compact('addTreasuries' , 'treasuries'));
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
        $addTreasuries = AddTreasury::findOrFail($id);
        $addTreasuries->update([
            'name' => $request->name,
            'treasury_id' => $request->treasury_id,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
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
        $addTreasuries = AddTreasury::findOrFail($id);
        $addTreasuries->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
