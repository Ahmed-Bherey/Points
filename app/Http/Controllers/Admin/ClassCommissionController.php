<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use Illuminate\Http\Request;
use App\Models\ClassCommission;
use App\Http\Controllers\Controller;

class ClassCommissionController extends Controller
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
        $items = IteItem::get();
        $classes = ClassCommission::get();
        return view('admin.pages.classCommission.create' , compact('classes' , 'items'));
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
        ClassCommission::create([
            'item_id' =>$request->item_id,
            'price' =>$request->price,
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
        $items = IteItem::get();
        $classes = ClassCommission::findOrFail($id);
        return view('admin.pages.classCommission.edit' , compact('classes' , 'items'));
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
        $classes = ClassCommission::findOrFail($id);
        $classes->update([
            'item_id' =>$request->item_id,
            'price' =>$request->price,
        ]);
        return redirect()->route('classCommission.create')->with(['success' => " تم  بنجاح"]);
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
        $classes = ClassCommission::findOrFail($id);
        $classes->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
