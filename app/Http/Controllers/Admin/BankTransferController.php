<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\BankTransfer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BankTransferController extends Controller
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
        $banksFrom = Bank::get();
        $banksTo = Bank::get();
        $banksTransfer = BankTransfer::get();
        return view('admin.pages.bankTreasury.create', compact('banksTransfer', 'banksFrom', 'banksTo'));
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
        $from = Bank::where('id', $request->bankFrom_id)
            ->value('amount');
        if ($request->value  <= $from) {
            Bank::where('id', $request->bankFrom_id)->update([
                'amount' => $from - $request->value,
            ]);
            $to = Bank::where('id', $request->bankTo_id)
                ->value('amount');
            Bank::where('id', $request->bankTo_id)->update([
                'amount' => $to + $request->value,
            ]);

            BankTransfer::create([
                'date' =>$request->date,
                'bankFrom_id' =>$request->bankFrom_id,
                'bankTo_id' =>$request->bankTo_id,
                'value' =>$request->value,
                'notes' =>$request->notes,
            ]);
            return redirect()->back()->with(['success' => " تم  بنجاح"]);
        } else {
            return redirect()->back()->with(['error' => " فشل التحويل الكمية لا تسمح"]);
    }
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
        $banksFrom = Bank::get();
        $banksTo = Bank::get();
        $banksTransfer = BankTransfer::findOrFail($id);
        return view('admin.pages.bankTreasury.edit', compact('banksTransfer', 'banksFrom', 'banksTo'));
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
        $bankTransfer = BankTransfer::findOrFail($id);
        $bankTransfer_balance = BankTransfer::where('bankFrom_id',$request->bankFrom_id)->value('value');
        $data = $bankTransfer_balance - $request->value;
        $from = Bank::where('id', $request->bankFrom_id)->value('amount');
        $to = Bank::where('id', $request->bankTo_id)->value('amount');
        if ($request->value  <= $from) {
            Bank::where('id', $request->bankFrom_id)->update([
                'amount' => $from + $data,
            ]);
            Bank::where('id', $request->bankTo_id)->update([
                'amount' => $to - $data,
            ]);
            $bankTransfer->update([
                'date' =>$request->date,
                'bankFrom_id' =>$request->bankFrom_id,
                'bankTo_id' =>$request->bankTo_id,
                'value' =>$request->value,
                'notes' =>$request->notes,
            ]);
            return redirect()->route('bankTransfer.create')->with(['success' => " تم  بنجاح"]);
        }else{
            return redirect()->back()->with(['error' => " فشل التحويل الكمية اقل من" . $request->value]);
        }
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
        $from_id = BankTransfer::where('id', $id)->value('bankFrom_id');
        $to_id = BankTransfer::where('id', $id)->value('bankTo_id');
        $bankTransfer = BankTransfer::findOrFail($id);
        $bankTransfer_balance = BankTransfer::where('id',$id)->value('value');
        $from = Bank::where('id', $from_id)->value('amount');
        $to = Bank::where('id', $to_id)->value('amount');
        Bank::where('id', $from_id)->update([
            'amount' => $from + $bankTransfer_balance,
        ]);
        Bank::where('id', $to_id)->update([
            'amount' => $to - $bankTransfer_balance,
        ]);
        $bankTransfer->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
