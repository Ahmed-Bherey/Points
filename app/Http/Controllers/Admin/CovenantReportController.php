<?php

namespace App\Http\Controllers\Admin;

use App\Models\CovenantData;
use Illuminate\Http\Request;
use App\Models\CovenantReport;
use App\Http\Controllers\Controller;

class CovenantReportController extends Controller
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
        $covenants = CovenantData::get();
        $covenantReports = CovenantReport::get();
        return view('admin.pages.CovenantReport.create', compact('covenantReports', 'covenants'));
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
        CovenantReport::create([
            'covenant_id' =>$request->covenant_id,
            'custodian' =>$request->custodian,
            'dateFrom' =>$request->dateFrom,
            'dateTo' =>$request->dateTo,
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
        $covenants = CovenantData::get();
        $covenantReports = CovenantReport::findOrFail($id);
        return view('admin.pages.CovenantReport.edit', compact('covenantReports', 'covenants'));
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
        $covenantReports = CovenantReport::findOrFail($id);
        $covenantReports->update([
            'covenant_id' =>$request->covenant_id,
            'custodian' =>$request->custodian,
            'dateFrom' =>$request->dateFrom,
            'dateTo' =>$request->dateTo,
        ]);
        return redirect()->route('covenantReport.create')->with(['success' => " تم  بنجاح"]);
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
        $covenantReports = CovenantReport::findOrFail($id);
        $covenantReports->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
