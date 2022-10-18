<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drawal;
use App\Models\Industrial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrawalController extends Controller
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
        $industrials = Industrial::get();
        $drawals = Drawal::get();
        return view('admin.pages.drawals.create' , compact('drawals' , 'industrials'));
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
        Drawal::create([
            'drawal_id' =>$request->drawal_id,
            'invoice_num' =>$request->invoice_num,
            'withdrawal_value' =>$request->withdrawal_value,
            'date' =>$request->date,
            'invoice_date' =>$request->invoice_date,
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
        $industrials = Industrial::get();
        $drawals = Drawal::findOrFail($id);
        return view('admin.pages.drawals.edit' , compact('drawals' , 'industrials'));
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
        $drawals = Drawal::findOrFail($id);
        $drawals->update([
            'drawal_id' =>$request->drawal_id,
            'invoice_num' =>$request->invoice_num,
            'withdrawal_value' =>$request->withdrawal_value,
            'date' =>$request->date,
            'invoice_date' =>$request->invoice_date,
        ]);
        return redirect()->route('drawal.create')->with(['success' => " تم  بنجاح"]);
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
        $drawals = Drawal::findOrFail($id);
        $drawals->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
