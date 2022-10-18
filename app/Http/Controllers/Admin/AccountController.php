<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Account;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
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
        $accounts = Account::get();
        return view('admin.pages.account.create', compact('accounts' , 'banks'));
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
        Account::create([
            'bank_id' => $request->bank_id,
            'amount' => $request->amount,
            'date' => $request->date,
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
        $accounts = Account::findOrFail($id);
        return view('admin.pages.account.edit', compact('accounts' , 'banks'));
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
        $accounts = Account::findOrFail($id);
        $accounts->update([
            'bank_id' => $request->bank_id,
            'amount' => $request->amount,
            'date' => $request->date,
        ]);
        return redirect()->route('account.create')->with(['success' => " تم  بنجاح"]);
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
        $accounts = Account::findOrFail($id);
        $accounts->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
