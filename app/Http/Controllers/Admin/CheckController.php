<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Check;
use App\Models\Client;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckController extends Controller
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
        $checks = Check::get();
        return view('admin.pages.Check.create', compact('checks', 'banks'));
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
        $supplier_balance = Supplier::where('id', $request->data)->value('balance');
        $client_balance = Client::where('id', $request->data)->value('balance');
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        if ($request->name == 1) {
            Client::where('id', $request->data)->update([
                'balance' => $client_balance - $request->amount,
            ]);
        } else {
            Supplier::where('id', $request->data)->update([
                'balance' => $supplier_balance - $request->amount,
            ]);
        }
        Bank::where('id', $request->bank_id)->update([
            'amount' => $bank_balance - $request->amount,
        ]);
        if( $request->name == 1){
        Check::create([
            'name' => $request->name,
            'bank_id' => $request->bank_id,
            'client_id' =>$request->data,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'date' => $request->date,
            'check_num' => $request->check_num,
            'to' => $request->to,
        ]);
    }
    else
    {
        Check::create([
            'name' => $request->name,
            'bank_id' => $request->bank_id,
            'supplier_id' =>$request->data,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'date' => $request->date,
            'check_num' => $request->check_num,
            'to' => $request->to,
        ]);
    }
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
        $checks = Check::findOrFail($id);

        return view('admin.pages.Check.edit', compact('checks', 'banks'));
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
        $supplier_balance = Supplier::where('id', $request->data)->value('balance');
        $client_balance = Client::where('id', $request->data)->value('balance');
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $check_balance = Check::where('id', $id)->where('bank_id', $request->bank_id)->value('amount');
        $data = $check_balance - $request->amount;
        if ($request->name == 1) {
            Client::where('id', $request->data)->update([
                'balance' => $client_balance + $data,
            ]);
        } else {
            Supplier::where('id', $request->data)->update([
                'balance' => $supplier_balance + $data,
            ]);
        }
        Bank::where('id', $request->bank_id)->update([
            'amount' => $bank_balance + $data,
        ]);
        $checks = Check::findOrFail($id);

        $checks->update([
            'name' => $request->name,
            'bank_id' => $request->bank_id,
            'amount' => $request->amount,
            'notes' => $request->notes,
            'date' => $request->date,
            'check_num' => $request->check_num,
            'to' => $request->to,
        ]);
        return redirect()->route('check.create')->with(['success' => " تم  بنجاح"]);
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
        $checks = Check::findOrFail($id);
        $checks->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function checkName($id)
    {
        if ($id == 1) {
            $data = Client::get();
        } else {
            $data = Supplier::get();
        }
        return json_encode($data);
    }
}
