<?php

namespace App\Http\Controllers\Admin;

use App\Models\Asset;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AssetsController extends Controller
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
        $assets = Asset::get();
        return view('admin.pages.assets.create', compact('assets'));
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
        Asset::create([
            'name' =>$request->name,
            'date' =>$request->date,
            'amount' =>$request->amount,
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
        $assets = Asset::findOrFail($id);
        return view('admin.pages.assets.edit', compact('assets'));
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
        $assets = Asset::findOrFail($id);
        $assets->update([
            'name' =>$request->name,
            'date' =>$request->date,
            'amount' =>$request->amount,
        ]);
        return redirect()->route('assets.create')->with(['success' => " تم  بنجاح"]);
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
        $assets = Asset::findOrFail($id);
        $assets->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
