<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Client;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\PayInstallment;
use App\Http\Controllers\Controller;

class PayInstallmentController extends Controller
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
        $payInstallments = PayInstallment::get();
        return view('admin.pages.payInstallment.create', compact('payInstallments', 'clients', 'treasuries', 'banks'));
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
        PayInstallment::create([
            'date' => $request->date,
            'client_id' => $request->client_id,
            'invoice_num' => $request->invoice_num,
            'invoice_date' => $request->invoice_date,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'total_of_all_installment' => $request->total_of_all_installment,
            'rest' => $request->rest,
            'monthly_total' => $request->monthly_total,
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
        $payInstallments = PayInstallment::findOrFail($id);
        return view('admin.pages.payInstallment.edit', compact('payInstallments', 'clients', 'treasuries', 'banks'));
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
        $payInstallments = PayInstallment::findOrFail($id);
        $payInstallments->update([
            'date' => $request->date,
            'client_id' => $request->client_id,
            'invoice_num' => $request->invoice_num,
            'invoice_date' => $request->invoice_date,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'total_of_all_installment' => $request->total_of_all_installment,
            'rest' => $request->rest,
            'monthly_total' => $request->monthly_total,
            'notes' => $request->notes,
        ]);
        return redirect()->route('payInstallment.create')->with(['success' => " تم  بنجاح"]);
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
        $payInstallments = PayInstallment::findOrFail($id);
        $payInstallments->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
