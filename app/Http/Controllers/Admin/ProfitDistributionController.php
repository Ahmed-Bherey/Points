<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\ProfitDistribution;
use App\Http\Controllers\Controller;

class ProfitDistributionController extends Controller
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
        $profitDistributions = ProfitDistribution::get();
        return view('admin.pages.profitDistribution.create', compact('profitDistributions' , 'treasuries' , 'banks'));
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
        ProfitDistribution::create([
            'date' => $request->date,
            'net_profit' => $request->net_profit,
            'draw_date' => $request->draw_date,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'dateTo' => $request->dateTo,
            'distributed_profit' => $request->distributed_profit,
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
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $profitDistributions = ProfitDistribution::findOrFail($id);
        return view('admin.pages.profitDistribution.edit', compact('profitDistributions' , 'treasuries' , 'banks'));
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
        $profitDistributions = ProfitDistribution::findOrFail($id);
        $profitDistributions->update([
            'date' => $request->date,
            'net_profit' => $request->net_profit,
            'draw_date' => $request->draw_date,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'dateTo' => $request->dateTo,
            'distributed_profit' => $request->distributed_profit,
            'amount' => $request->amount,
            'notes' => $request->notes,
        ]);
        return redirect()->route('profitDistribution.create')->with(['success' => " تم  بنجاح"]);
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
        $profitDistributions = ProfitDistribution::findOrFail($id);
        $profitDistributions->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
