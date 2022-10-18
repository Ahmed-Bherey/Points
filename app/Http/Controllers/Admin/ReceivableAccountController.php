<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ReceivablesData;
use App\Models\ReceivableAccount;
use App\Http\Controllers\Controller;

class ReceivableAccountController extends Controller
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
        $receivableAccounts = ReceivableAccount::get();
        return view('admin.pages.receivableAccount.create', compact('receivableAccounts' , 'receivables'));
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
        $receivableData = ReceivablesData::where('id',$request->receivable_id)->value('balance');
        if ($request->process == 1) {
            ReceivablesData::where('id',$request->receivable_id)->update([
                'balance' =>$receivableData - $request->amount,
            ]);
        } else {
            ReceivablesData::where('id',$request->receivable_id)->update([
                'balance' =>$receivableData + $request->amount,
            ]);
        }

        ReceivableAccount::create([
            'receivable_id' => $request->receivable_id,
            'process' => $request->process,
            'amount' => $request->amount,
            'date' => $request->date,
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
        $receivables = ReceivablesData::get();
        $receivableAccounts = ReceivableAccount::findOrFail($id);
        return view('admin.pages.receivableAccount.edit', compact('receivableAccounts' , 'receivables'));
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
        $receivableAccounts = ReceivableAccount::findOrFail($id);
        $receivableAccounts->update([
            'receivable_id' => $request->receivable_id,
            'process' => $request->process,
            'amount' => $request->amount,
            'date' => $request->date,
            'notes' => $request->notes,
        ]);
        return redirect()->route('receivableAccount.create')->with(['success' => " تم  بنجاح"]);
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
        $receivableAccounts = ReceivableAccount::findOrFail($id);
        $receivableAccounts->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }

    public function receivableAjax($id){
        $receivable_balance = ReceivablesData::where('id',$id)->value('balance');
        return json_encode($receivable_balance);
    }
}
