<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\GeneralAccount;
use App\Models\GeneralExpense;
use App\Http\Controllers\Controller;

class GeneralExpenseController extends Controller
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
        $generalAccounts = GeneralAccount::where('active',1)->get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $generalExpenses = GeneralExpense::get();
        return view('admin.pages.generalExpenses.create', compact('generalExpenses' , 'generalAccounts' , 'treasuries' , 'banks'));
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
        GeneralExpense::create([
            'date' =>$request->date,
            'publicAccount_id' =>$request->publicAccount_id,
            'notes' =>$request->notes,
            'amount' =>$request->amount,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'consumption' =>$request->consumption,
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
        $generalAccounts = GeneralAccount::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $generalExpenses = GeneralExpense::findOrFail($id);
        return view('admin.pages.generalExpenses.edit', compact('generalExpenses' , 'generalAccounts' , 'treasuries' , 'banks'));
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
        $generalExpenses = GeneralExpense::findOrFail($id);
        $generalExpenses->update([
            'date' =>$request->date,
            'publicAccount_id' =>$request->publicAccount_id,
            'notes' =>$request->notes,
            'amount' =>$request->amount,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'consumption' =>$request->consumption,
        ]);
        return redirect()->route('generalExpense.create')->with(['success' => " تم  بنجاح"]);
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
        $generalExpenses = GeneralExpense::findOrFail($id);
        $generalExpenses->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
