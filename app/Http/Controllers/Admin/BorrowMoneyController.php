<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use App\Models\BorrowMoney;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BorrowMoneyController extends Controller
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
        $borrowMonies = BorrowMoney::get();
        return view('admin.pages.borrowMoney.create', compact('borrowMonies' , 'clients'));
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
        BorrowMoney::create([
            'client_id' =>$request->client_id,
            'date' =>$request->date,
            'type' =>$request->type,
            'amount' =>$request->amount,
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
        $borrowMonies = BorrowMoney::findOrFail($id);
        return view('admin.pages.borrowMoney.edit', compact('borrowMonies' , 'clients'));
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
        $borrowMonies = BorrowMoney::findOrFail($id);
        $borrowMonies->update([
            'client_id' =>$request->client_id,
            'date' =>$request->date,
            'type' =>$request->type,
            'amount' =>$request->amount,
        ]);
        return redirect()->route('borrowMoney.create')->with(['success' => " تم  بنجاح"]);
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
        $borrowMonies = BorrowMoney::findOrFail($id);
        $borrowMonies->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
