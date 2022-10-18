<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\WithdrawDeposite;
use App\Http\Controllers\Controller;

class WithdrawDepositeController extends Controller
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
        $withdrawDeposites = WithdrawDeposite::get();
        return view('admin.pages.withdrawDeposite.create', compact('withdrawDeposites', 'banks', 'treasuries'));
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
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value('treasury_value');
        if ($request->process == 1) {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $request->amount,
            ]);
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $request->amount,
            ]);
        } else {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $request->amount,
            ]);
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $request->amount,
            ]);
        }

        WithdrawDeposite::create([
            'bank_id' => $request->bank_id,
            'process' => $request->process,
            'amount' => $request->amount,
            'date' => $request->date,
            'treasury_id' => $request->treasury_id,
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
        $withdrawDeposites = WithdrawDeposite::findOrFail($id);
        return view('admin.pages.withdrawDeposite.edit', compact('withdrawDeposites', 'banks', 'treasuries'));
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
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value('treasury_value');
        $withdrawDeposites = WithdrawDeposite::where('id', $id)->where('bank_id', $request->bank_id)->where('treasury_id', $request->treasury_id)->value('amount');
        $bankData = $withdrawDeposites - $request->amount;
        $treasuryData = $withdrawDeposites - $request->amount;
        if ($request->process == 1) {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $bankData,
            ]);
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $treasuryData,
            ]);
        } else {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $bankData,
            ]);
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $treasuryData,
            ]);
        }

        $withdrawDeposites = WithdrawDeposite::findOrFail($id);
        $withdrawDeposites->update([
            'bank_id' => $request->bank_id,
            'process' => $request->process,
            'amount' => $request->amount,
            'date' => $request->date,
            'treasury_id' => $request->treasury_id,
            'notes' => $request->notes,
        ]);
        return redirect()->route('withdrawDeposite.create')->with(['success' => " تم  بنجاح"]);
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
        $withdrawDeposites = WithdrawDeposite::findOrFail($id);
        $withdrawDeposites->delete();
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function bankAjax($id)
    {
        $buybill_bank_balance = Bank::where('id', $id)->value('amount');
        return json_encode($buybill_bank_balance);
    }

    public function treasuryAjax($id)
    {
        $treasury_balance = Treasury::where('id', $id)->value('treasury_value');
        return json_encode($treasury_balance);
    }

    // Method To Delete All Records
    // public function deleteAllRecord()
    // {
    //     //
    //     WithdrawDeposite::truncate();
    //     return redirect()->back()->with(['error' => " تم  بنجاح"]);
    // }
}
