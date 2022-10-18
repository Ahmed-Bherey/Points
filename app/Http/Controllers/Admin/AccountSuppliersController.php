<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Account;
use App\Models\Supplier;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\AccountSuppliers;
use App\Http\Controllers\Controller;
use App\Models\SupplierProces;

class AccountSuppliersController extends Controller
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
        $suppliers = Supplier::get();
        $accounts = AccountSuppliers::get();
        return view('admin.pages.accountSuppliers.create', compact('accounts' , 'treasuries' , 'banks' , 'suppliers'));
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
        $supplier_balance = Supplier::where('id',$request->supplier_id)->value('balance');
        $bank_balance = Bank::where('id',$request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id',$request->treasury_id)->value('treasury_value');

        Supplier::where('id',$request->supplier_id)->update([
            'balance' =>$supplier_balance - $request->amount,
        ]);
        if($request->payment_getway == 1){
        Bank::where('id',$request->bank_id)->update([
            'amount' =>$bank_balance - $request->amount,
        ]);
    }elseif($request->payment_getway == 2){
        Treasury::where('id',$request->treasury_id)->update([
            'treasury_value' =>$treasury_balance - $request->amount,
        ]);
    }
        AccountSuppliers::create([
            'supplier_id' =>$request->supplier_id,
            'receipt_num' =>$request->receipt_num,
            'date' =>$request->date,
            'payment_getway' =>$request->payment_getway,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'amount' =>$request->amount,
            'note' =>$request->note,
        ]);
        SupplierProces::create([
            'supplier_id' =>$request->supplier_id,
            'debtor' =>$request->amount,
            'notes' =>$request->note,
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
        $suppliers = Supplier::get();
        $accounts = AccountSuppliers::findOrFail($id);
        return view('admin.pages.accountSuppliers.edit', compact('accounts' , 'treasuries' , 'banks' , 'suppliers'));
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
        $accounts = AccountSuppliers::findOrFail($id);

        // $bank_balance = Account::where('id',$request->bank_id)->value('amount');
        // dd($bank_balance);
        // exit();
        $supplier_balance = Supplier::where('id',$request->supplier_id)->value('balance');
        Supplier::where('id',$request->supplier_id)->update([
            'balance' =>$supplier_balance - $request->amount,
        ]);

        $supplierBank_process = AccountSuppliers::where('id',$id)->value('amount');
        $supplierBank_processData = $supplierBank_process - $request->amount;
        $bank_balance = Bank::where('id',$request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id',$request->treasury_id)->value('treasury_value');
        if($request->payment_getway == 1){
        Bank::where('id',$request->bank_id)->update([
            'amount' =>$bank_balance + $supplierBank_processData,
        ]);
            }elseif($request->payment_getway == 2){
        Treasury::where('id',$request->treasury_id)->update([
            'treasury_value' =>$treasury_balance + $supplierBank_processData,
        ]);
    }
        $accounts->update([
            'supplier_id' =>$request->supplier_id,
            'receipt_num' =>$request->receipt_num,
            'date' =>$request->date,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'amount' =>$request->amount,
            'note' =>$request->note,
    ]);
        SupplierProces::where('id',$id)->update([
            'supplier_id' =>$request->supplier_id,
            'debtor' =>$request->amount,
            'notes' =>$request->note,
        ]);
        return redirect()->route('accountSuppliers.create')->with(['success' => " تم  بنجاح"]);
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
        $accounts = AccountSuppliers::findOrFail($id);
        $accounts->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
