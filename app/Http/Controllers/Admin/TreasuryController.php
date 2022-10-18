<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TreasuryController extends Controller
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
        return view('admin.pages.treasury.create', compact('treasuries'));
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
        Treasury::create([
            'name' => $request->name,
            'treasury_value' => $request->treasury_value,
            'treasury_secretary' => $request->treasury_secretary,
            'note' => $request->note,
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
        $treasuries = Treasury::findOrFail($id);
        return view('admin.pages.treasury.edit', compact('treasuries'));
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
        $treasuries = Treasury::findOrFail($id);
        $treasuries->update([
            'name' => $request->name,
            'treasury_value' => $request->treasury_value,
            'treasury_secretary' => $request->treasury_secretary,
            'note' => $request->note,
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
        $treasuries = Treasury::findOrFail($id);
        $treasuries->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
