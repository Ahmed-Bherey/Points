<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DiscountAddNotification;

class DiscountAddNotificationController extends Controller
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
        $suppliers = Supplier::get();
        $discountAddNotifications = DiscountAddNotification::get();
        return view('admin.pages.DiscountAddNotification.create', compact('discountAddNotifications', 'suppliers'));
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
        $supplier_balance = Supplier::where('id', $request->supplier_id)->value('balance');
        if ($request->discountAddNotification_type == 1){
            Supplier::where('id', $request->supplier_id)->update([
                'balance' =>$supplier_balance - $request->amount,
            ]);
        }elseif ($request->discountAddNotification_type == 2){
            Supplier::where('id', $request->supplier_id)->update([
                'balance' =>$supplier_balance + $request->amount,
            ]);
        }
        DiscountAddNotification::create([
            'discountAddNotification_type' =>$request->discountAddNotification_type,
            'supplier_id' =>$request->supplier_id,
            'date' =>$request->date,
            'amount' =>$request->amount,
            'last_balance' =>$request->last_balance,
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
        $suppliers = Supplier::get();
        $discountAddNotifications = DiscountAddNotification::findOrFail($id);
        return view('admin.pages.DiscountAddNotification.edit', compact('discountAddNotifications', 'suppliers'));
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
        $supplier_balance = Supplier::where('id', $request->supplier_id)->value('balance');
        $supplierNotification_balance = DiscountAddNotification::where('supplier_id',$request->supplier_id)->value('amount');
        $data = $supplierNotification_balance - $request->amount;
        if ($request->discountAddNotification_type == 1){
            Supplier::where('id', $request->supplier_id)->update([
                'balance' =>$supplier_balance + $data,
            ]);
        }elseif ($request->discountAddNotification_type == 2){
            Supplier::where('id', $request->supplier_id)->update([
                'balance' =>$supplier_balance - $data,
            ]);
        }

        $discountAddNotifications = DiscountAddNotification::findOrFail($id);
        $discountAddNotifications->update([
            'discountAddNotification_type' =>$request->discountAddNotification_type,
            'supplier_id' =>$request->supplier_id,
            'date' =>$request->date,
            'amount' =>$request->amount,
            'last_balance' =>$request->last_balance,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('discountAddNotification.create')->with(['success' => " تم  بنجاح"]);
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
        $discountAddNotifications = DiscountAddNotification::findOrFail($id);
        $discountAddNotifications->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
