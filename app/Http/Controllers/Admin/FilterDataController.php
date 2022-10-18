<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\FilterData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilterDataController extends Controller
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
        $clients = Client::get();
        $filters = FilterData::get();
        return view('admin.pages.FilterData.create' , compact('filters' , 'clients'));
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
        FilterData::create([
            'client_id' => $request->client_id,
            'status' => $request->status,
            'device_name' => $request->device_name,
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
        $clients = Client::get();
        $filters = FilterData::findOrFail($id);
        return view('admin.pages.FilterData.edit' , compact('filters' , 'clients'));
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
        $filters = FilterData::findOrFail($id);
        $filters->update([
            'client_id' => $request->client_id,
            'status' => $request->status,
            'device_name' => $request->device_name,
        ]);
        return redirect()->route('filterData.create')->with(['success' => " تم  بنجاح"]);
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
        $filters = FilterData::findOrFail($id);
        $filters->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
