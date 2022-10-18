<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\PartnerProcess;
use App\Http\Controllers\Controller;

class PartnerProcessController extends Controller
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
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $partners = PartnerProcess::get();
        return view('admin.pages.Partnersprocess.create', compact('clients', 'treasuries', 'partners', 'banks'));
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
        $treasury_balance = Treasury::where('id', $request->treasure_id)->value('treasury_value');
        if ($request->process == 1) {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $request->amount,
            ]);
            Treasury::where('id', $request->treasure_id)->update([
                'treasury_value' => $treasury_balance + $request->amount,
            ]);
        } else {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $request->amount,
            ]);
            Treasury::where('id', $request->treasure_id)->update([
                'treasury_value' => $treasury_balance - $request->amount,
            ]);
        }
        PartnerProcess::create([
            'client_id' => $request->client_id,
            'process' => $request->process,
            'treasure_id' => $request->treasure_id,
            'bank_id' => $request->bank_id,
            'date' => $request->date,
            'amount' => $request->amount,
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
        $clients = Client::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $partners = PartnerProcess::findOrFail($id);
        return view('admin.pages.Partnersprocess.edit', compact('clients', 'treasuries', 'partners', 'banks'));
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
        $treasury_balance = Treasury::where('id', $request->treasure_id)->value('treasury_value');
        $withdrawDeposites = PartnerProcess::where('id', $id)->where('bank_id', $request->bank_id)->where('treasure_id', $request->treasure_id)->value('amount');
        $bankData = $withdrawDeposites - $request->amount;
        $treasuryData = $withdrawDeposites - $request->amount;
        if ($request->process == 1) {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $bankData,
            ]);
            Treasury::where('id', $request->treasure_id)->update([
                'treasury_value' => $treasury_balance - $treasuryData,
            ]);
        } else {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $bankData,
            ]);
            Treasury::where('id', $request->treasure_id)->update([
                'treasury_value' => $treasury_balance + $treasuryData,
            ]);
        }
        $partners = PartnerProcess::findOrFail($id);
        $partners->update([
            'client_id' => $request->client_id,
            'process' => $request->process,
            'treasure_id' => $request->treasure_id,
            'bank_id' => $request->bank_id,
            'date' => $request->date,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);
        return redirect()->route('partner-process.create')->with(['success' => " تم  بنجاح"]);
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
        $partners = PartnerProcess::findOrFail($id);
        $partners->delete();
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }
}
