<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\DuesToClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuesToClientController extends Controller
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
        $duesToClients = DuesToClient::get();
        return view('admin.pages.DuesToClients.create' , compact('duesToClients' , 'clients'));
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
        DuesToClient::create([
            'client_id' =>$request->client_id,
            'amount' =>$request->amount,
            'date' =>$request->date,
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
        $clients = Client::get();
        $duesToClients = DuesToClient::findOrFail($id);
        return view('admin.pages.DuesToClients.edit' , compact('duesToClients' , 'clients'));
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
        $duesToClients = DuesToClient::findOrFail($id);
        $duesToClients->update([
            'client_id' =>$request->client_id,
            'amount' =>$request->amount,
            'date' =>$request->date,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('duesToClient.create')->with(['success' => " تم  بنجاح"]);
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
        $duesToClients = DuesToClient::findOrFail($id);
        $duesToClients->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
