<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Representative;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::get();
        $representatives = Representative::get();
        $visits = Visit::get();
        return view('admin.pages.visit.create',compact('visits','representatives','clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Visit::create([
            "client_id" => $request->ciient_id,
            "data" => $request->data,
            "representative_id" => $request->representative_id,
            "description" => $request->description,

        ]);

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
        $clients = Client::get();
        $representatives = Representative::get();
        $visits = Visit::find($id);
        return view('admin.pages.visit.edit',compact('visits','representatives','clients'));
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
        $visits=Visit::find($id);
        $visits->update(
            [
                "client_id" => $request->ciient_id,
            "data" => $request->data,
            "representative_id" => $request->representative_id,
            "description" => $request->description,

        ]);
        return redirect()->route('visits.create.index')->with(['error' => " تم  بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $visits=Visit::find($id);
        $visits->delete();
        return redirect()->route('visits.create.index')->with(['error' => " تم  بنجاح"]);
    }
}
