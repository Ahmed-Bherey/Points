<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BorrowerData;
use App\Models\WithdrawalDepositAdvance;

class WithdrawalDepositAdvanceController extends Controller
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
        $borrowersData = BorrowerData::get();
        $banks = Bank::get();
        $treasuries = Treasury::get();
        $withdrawalDepositAdvances = WithdrawalDepositAdvance::get();
        return view('admin.pages.withdrawalDepositAdvance.create', compact('withdrawalDepositAdvances', 'borrowersData' , 'banks' , 'treasuries'));
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
        if ($request->bank_id != "" && $request->treasury_id == ""){
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $request->amount,
            ]);
        }elseif($request->bank_id == "" && $request->treasury_id != ""){
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $request->amount,
            ]);
        }elseif($request->bank_id == "" && $request->treasury_id == ""){
            return redirect()->back()->with(['error' => "عذرا لا يمكن اتمام العملية , من افضلك اختر بنك او خزينة"]);
        }else{
            return redirect()->back()->with(['error' => "عذرا لا يمكن اتمام العملية , من فضلك اختر احدهما"]);
        }
        WithdrawalDepositAdvance::create([
            'borrowerData_id' => $request->borrowerData_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'borrower_order' => $request->borrower_order,
            'process_type' => $request->process_type,
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
        $borrowersData = BorrowerData::get();
        $banks = Bank::get();
        $treasuries = Treasury::get();
        $withdrawalDepositAdvances = WithdrawalDepositAdvance::findOrFail($id);
        return view('admin.pages.withdrawalDepositAdvance.edit', compact('withdrawalDepositAdvances', 'borrowersData' , 'banks' , 'treasuries'));
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
        $withdrawalDepositAdvances = WithdrawalDepositAdvance::findOrFail($id);
        $withdrawalDepositAdvances->update([
            'borrowerData_id' => $request->borrowerData_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'borrower_order' => $request->borrower_order,
            'process_type' => $request->process_type,
            'rest' => $request->rest,
            'notes' => $request->notes,
        ]);
        return redirect()->route('withdrawalDepositAdvance.create')->with(['success' => " تم  بنجاح"]);
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
        $withdrawalDepositAdvances = WithdrawalDepositAdvance::findOrFail($id);
        $withdrawalDepositAdvances->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
