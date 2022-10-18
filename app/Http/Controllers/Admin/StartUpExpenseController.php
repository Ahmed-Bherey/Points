<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\StartUpExpense;
use App\Http\Controllers\Controller;

class StartUpExpenseController extends Controller
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
        $startUpExpenses = StartUpExpense::get();
        return view('admin.pages.startUpExpenses.create', compact('startUpExpenses', 'treasuries'));
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
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value('treasury_value');
        if ($request->amount <= $treasury_balance) {
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $request->amount,
            ]);
        } else {
            return redirect()->back()->with(['error' => "عذرا الكمية لا تسمح , يجب ان تكون اقل من او تساوى " . $treasury_balance]);
        }
        // dd($treasury_balance);
        // exit();
        StartUpExpense::create([
            'date' => $request->date,
            'name' => $request->name,
            'amount' => $request->amount,
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
        $treasuries = Treasury::get();
        $startUpExpenses = StartUpExpense::findOrFail($id);
        return view('admin.pages.startUpExpenses.edit', compact('startUpExpenses', 'treasuries'));
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
        $startUpExpenses = StartUpExpense::findOrFail($id);
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value('treasury_value');
        $startUpExpense_amount = StartUpExpense::where('id', $id)->where('treasury_id',$request->treasury_id)->value('amount');
        $data = $startUpExpense_amount - $request->amount;
        // dd($data);
        // exit();
        if ($request->amount <= $treasury_balance) {
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $data,
            ]);
        } else {
            return redirect()->back()->with(['error' => "عذرا الكمية لا تسمح , يجب ان تكون اقل من او تساوى " . $treasury_balance]);
        }
        $startUpExpenses->update([
            'date' => $request->date,
            'name' => $request->name,
            'amount' => $request->amount,
            'treasury_id' => $request->treasury_id,
            'notes' => $request->notes,
        ]);
        return redirect()->route('startUpExpense.create')->with(['success' => " تم  بنجاح"]);
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
        $startUpExpenses = StartUpExpense::findOrFail($id);
        $startUpExpenses->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
