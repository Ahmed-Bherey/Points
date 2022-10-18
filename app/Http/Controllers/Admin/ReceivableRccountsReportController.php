<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReceivablesData;
use App\Http\Controllers\Controller;
use App\Models\ReceivableRccountsReport;

class ReceivableRccountsReportController extends Controller
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
        $receivables = ReceivablesData::get();
        $reports = ReceivableRccountsReport::get();
        return view('admin.pages.receivableRccountsReport.create', compact('reports' , 'receivables'));
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
        ReceivableRccountsReport::create([
            'receivable_id' => $request->receivable_id,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo,
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
        $receivables = ReceivablesData::get();
        $reports = ReceivableRccountsReport::findOrFail($id);
        return view('admin.pages.receivableRccountsReport.edit', compact('reports' , 'receivables'));
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
        $reports = ReceivableRccountsReport::findOrFail($id);
        $reports->update([
            'receivable_id' => $request->receivable_id,
            'dateFrom' => $request->dateFrom,
            'dateTo' => $request->dateTo,
        ]);
        return redirect()->route('receivableRccountsReport.create')->with(['success' => " تم  بنجاح"]);
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
        $reports = ReceivableRccountsReport::findOrFail($id);
        $reports->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
