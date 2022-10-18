<?php

namespace App\Http\Controllers\Admin;

use App\Models\Destruction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestructionController extends Controller
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
        $destructions = Destruction::get();
        return view('admin.pages.Destruction.create', compact('destructions'));
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
        Destruction::create([
            'name' =>$request->name,
            'assets_amount' =>$request->assets_amount,
            'destructions_amount' =>$request->destructions_amount,
            'date' =>$request->date,
            'pure_asset' =>$request->pure_asset,
            'destruction_amount' =>$request->destruction_amount,
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
        $destructions = Destruction::findOrFail($id);
        return view('admin.pages.Destruction.edit', compact('destructions'));
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
        $destructions = Destruction::findOrFail($id);
        $destructions->update([
            'name' =>$request->name,
            'assets_amount' =>$request->assets_amount,
            'destructions_amount' =>$request->destructions_amount,
            'date' =>$request->date,
            'pure_asset' =>$request->pure_asset,
            'destruction_amount' =>$request->destruction_amount,
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
        $destructions = Destruction::findOrFail($id);
        $destructions->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
