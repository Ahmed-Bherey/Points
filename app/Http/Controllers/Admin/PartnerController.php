<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
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
        $partners = Partner::get();
        return view('admin.pages.partners.create', compact('partners' , 'treasuries'));
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
        Partner::create([
            'name' =>$request->name,
            'address' =>$request->address,
            'amount' =>$request->amount,
            'treasury_id' =>$request->treasury_id,
            'type' =>$request->type,
            'tel' =>$request->tel,
            'rate' =>$request->rate,
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
        $treasuries = Treasury::get();
        $partners = Partner::findOrFail($id);
        return view('admin.pages.partners.edit', compact('partners' , 'treasuries'));
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
        $partners = Partner::findOrFail($id);
        $partners->update([
            'name' =>$request->name,
            'address' =>$request->address,
            'amount' =>$request->amount,
            'treasury_id' =>$request->treasury_id,
            'type' =>$request->type,
            'tel' =>$request->tel,
            'rate' =>$request->rate,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('partner.create')->with(['success' => " تم  بنجاح"]);
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
        $partners = Partner::findOrFail($id);
        $partners->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
