<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use Illuminate\Http\Request;
use App\Models\AddCateqIncomplete;
use App\Http\Controllers\Controller;

class AddCateqIncompleteController extends Controller
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
        $cateqIncompletes = AddCateqIncomplete::get();
        return view('admin.pages.addCateqIncomplete.create' , compact('cateqIncompletes' ,'items'));
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
        AddCateqIncomplete::create([
            'item_id' =>$request->item_id,
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
        $cateqIncompletes = AddCateqIncomplete::findOrFail($id);
        return view('admin.pages.addCateqIncomplete.edit' , compact('cateqIncompletes' ,'items'));
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
        $cateqIncompletes = AddCateqIncomplete::findOrFail($id);
        $cateqIncompletes->update([
            'item_id' =>$request->item_id,
        ]);
        return redirect()->route('cateqIncomplete.create')->with(['success' => " تم  بنجاح"]);
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
        $cateqIncompletes = AddCateqIncomplete::findOrFail($id);
        $cateqIncompletes->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
