<?php

namespace App\Http\Controllers\Admin;

use App\Models\StStore;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialController extends Controller
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
        $stores = StStore::get();
        $materials = Material::get();
        return view('admin.pages.material.create', compact('materials' , 'stores'));
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
        Material::create([
            'store_id' =>$request->store_id,
            'material_num' =>$request->material_num,
            'date' =>$request->date,
            'quantity' =>$request->quantity,
            'material_type' =>$request->material_type,
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
        $stores = StStore::get();
        $materials = Material::findOrFail($id);
        return view('admin.pages.material.edit', compact('materials' , 'stores'));
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
        $materials = Material::findOrFail($id);
        $materials->update([
            'store_id' =>$request->store_id,
            'material_num' =>$request->material_num,
            'date' =>$request->date,
            'quantity' =>$request->quantity,
            'material_type' =>$request->material_type,
        ]);
        return redirect()->route('material.create')->with(['success' => " تم  بنجاح"]);
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
        $materials = Material::findOrFail($id);
        $materials->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
