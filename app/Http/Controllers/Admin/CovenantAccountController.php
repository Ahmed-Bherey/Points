<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use App\Models\CovenantData;
use Illuminate\Http\Request;
use App\Models\CovenantAccount;
use App\Http\Controllers\Controller;

class CovenantAccountController extends Controller
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
        $banks = Bank::get();
        $treasuries = Treasury::get();
        $covenants = CovenantData::get();
        $covenantAccounts = CovenantAccount::get();
        return view('admin.pages.covenantAccount.create', compact('covenantAccounts', 'treasuries', 'covenants', 'banks'));
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
        CovenantAccount::create([
            'covenant_id' => $request->covenant_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'custodian' => $request->custodian,
            'process' => $request->process,
            'rest' => $request->rest,
            'notes' => $request->notes,
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
        $banks = Bank::get();
        $treasuries = Treasury::get();
        $covenants = CovenantData::get();
        $covenantAccounts = CovenantAccount::findOrFail($id);
        return view('admin.pages.covenantAccount.edit', compact('covenantAccounts', 'treasuries', 'covenants', 'banks'));
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
        $covenantAccounts = CovenantAccount::findOrFail($id);
        $covenantAccounts->update([
            'covenant_id' => $request->covenant_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'custodian' => $request->custodian,
            'process' => $request->process,
            'rest' => $request->rest,
            'notes' => $request->notes,
        ]);
        return redirect()->route('covenantAccount.create')->with(['success' => " تم  بنجاح"]);
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
        $covenantAccounts = CovenantAccount::findOrFail($id);
        $covenantAccounts->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
