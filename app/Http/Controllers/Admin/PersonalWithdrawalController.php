<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\PersonalWithdrawal;
use App\Http\Controllers\Controller;

class PersonalWithdrawalController extends Controller
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
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $personalWithdrawals = PersonalWithdrawal::get();
        return view('admin.pages.personalWithdrawal.create', compact('personalWithdrawals', 'treasuries', 'banks'));
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

        PersonalWithdrawal::create([
            'date' => $request->date,
            'process' => $request->process,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
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
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $personalWithdrawals = PersonalWithdrawal::findOrFail($id);
        return view('admin.pages.personalWithdrawal.edit', compact('personalWithdrawals', 'treasuries', 'banks'));
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
        $personalWithdrawals = PersonalWithdrawal::where('id', $id)->where('bank_id', $request->bank_id)->where('treasury_id', $request->treasury_id)->value('amount');
        $bankData = $personalWithdrawals - $request->amount;
        $treasuryData = $personalWithdrawals - $request->amount;
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

        $personalWithdrawals = PersonalWithdrawal::findOrFail($id);
        $personalWithdrawals->update([
            'date' => $request->date,
            'process' => $request->process,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'notes' => $request->notes,
        ]);
        return redirect()->route('personalWithdrawal.create')->with(['success' => " تم  بنجاح"]);
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
        $personalWithdrawals = PersonalWithdrawal::findOrFail($id);
        $personalWithdrawals->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
