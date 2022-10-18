<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;

class RepresentativeController extends Controller
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
        $representatives = Representative::get();
        return view('admin.pages.representative.create' , compact('representatives'));
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
        Representative::create([
            'name' =>$request->name,
            'address' =>$request->address,
            'target' =>$request->target,
            'note' =>$request->note,
            'status' =>$request->status,
            'tel' =>$request->tel,
            'commission' =>$request->commission,
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
        $representatives = Representative::findOrFail($id);
        return view('admin.pages.representative.edit' , compact('representatives'));
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
        $representatives = Representative::findOrFail($id);
        $representatives->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'target' =>$request->target,
            'note' =>$request->note,
            'status' =>$request->status,
            'tel' =>$request->tel,
            'commission' =>$request->commission,
        ]);
        return redirect()->route('representative.create')->with(['success' => " تم  بنجاح"]);
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
        $representatives = Representative::findOrFail($id);
        $representatives->delete();
        return redirect()->back()->with(['error' => " تم  بنجاح"]);
    }
}
