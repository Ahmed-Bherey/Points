<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\ClientAccount;
use App\Models\Representative;
use App\Http\Controllers\Controller;

class ClientAccountController extends Controller
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
        $representatives = Representative::get();
        $clients = Client::get();
        $clientAccounts = ClientAccount::get();
        return view('admin.pages.clientAccounts.create', compact('clientAccounts' , 'banks' , 'treasuries' , 'representatives' , 'clients'));
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
        ClientAccount::create([
            'client_id' =>$request->client_id,
            'tel' =>$request->tel,
            'receipt_num' =>$request->receipt_num,
            'invoice_num' =>$request->invoice_num,
            'representative_id' =>$request->representative_id,
            'date' =>$request->date,
            'bank_id' =>$request->bank_id,
            'treasury_id' =>$request->treasury_id,
            'paid_to' =>$request->paid_to,
            'paid_from' =>$request->paid_from,
            'rest' =>$request->rest,
            'notes' =>$request->notes,
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
        $representatives = Representative::get();
        $clients = Client::get();
        $clientAccounts = ClientAccount::findOrFail($id);
        return view('admin.pages.clientAccounts.edit', compact('clientAccounts' , 'banks' , 'treasuries' , 'representatives' , 'clients'));
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
        $clientAccounts = ClientAccount::findOrFail($id);
        $clientAccounts->update([
            'client_id' =>$request->client_id,
            'tel' =>$request->tel,
            'receipt_num' =>$request->receipt_num,
            'invoice_num' =>$request->invoice_num,
            'representative_id' =>$request->representative_id,
            'date' =>$request->date,
            'bank_id' =>$request->bank_id,
            'treasury_id' =>$request->treasury_id,
            'paid_to' =>$request->paid_to,
            'paid_from' =>$request->paid_from,
            'rest' =>$request->rest,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('clientAccount.create')->with(['success' => " تم  بنجاح"]);
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
        $clientAccounts = ClientAccount::findOrFail($id);
        $clientAccounts->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }

    public function treasuryAjax($id)
    {
        $buybill_balance = Treasury::where('id', $id)->value('treasury_value');
        return json_encode($buybill_balance);
    }

    public function bankAjax($id)
    {
        $buybill_bank_balance = Bank::where('id', $id)->value('amount');
        return json_encode($buybill_bank_balance);
    }
}
