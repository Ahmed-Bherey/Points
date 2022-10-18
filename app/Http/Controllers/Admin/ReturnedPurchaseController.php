<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Account;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Supplier;
use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Models\ReturnedPurchase;
use App\Http\Controllers\Controller;
use App\Models\ReturnedPurchaseTotal;

class ReturnedPurchaseController extends Controller
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
    // public function create()
    // {
    //     //
    //     $stores = StStore::get();
    //     $suppliers = Supplier::get();
    //     $treasuries = Treasury::get();
    //     $banks = Bank::get();
    //     $delegates = Representative::get();
    //     $items = IteItem::get();
    //     $units = IteUnit::get();
    //     $totals = ReturnedPurchaseTotal::get();
    //     $returnedPurchases = ReturnedPurchase::get();
    //     return view('admin.pages.returnedPurchase.create',compact('returnedPurchases','stores','suppliers','treasuries','banks','delegates','items','units','totals'));
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    //     $totals = ReturnedPurchaseTotal::create([
    //         'date' => $request->date,
    //         'store_id' => $request->store_id,
    //         'supplier_id' => $request->supplier_id,
    //         'supplier_balance' => $request->supplier_balance,
    //         'treasury_id' => $request->treasury_id,
    //         'bank_id' => $request->bank_id,
    //         'delegate_id' => $request->delegate_id,
    //         'notes' => $request->notes,
    //         'invoice_num' => $request->invoice_num,
    //         'total_after_discount' => $request->total_after_discount,
    //         'paid' => $request->paid,
    //         'rest' => $request->rest,
    //         'last_balance' => $request->last_balance,
    //         'total_before_discount' => $request->total_before_discount,
    //         'discount_ratee' => $request->discount_ratee,
    //         'last_purchasing_price' => $request->last_purchasing_price,
    //         'discount_valuee' => $request->discount_valuee,
    //         'tax_added_value_rate' => $request->tax_added_value_rate,
    //         'transport_cost' => $request->transport_cost,
    //         'purchase_status' => $request->purchase_status,
    //         'top_price' => $request->top_price,
    //         'low_price' => $request->low_price,
    //         'average_price' => $request->average_price,
    //         'payment_getway' => $request->payment_getway,
    //     ]);

    //     foreach ($request->data['item_id'] as $key => $value) {
    //         ReturnedPurchase::create([
    //             'total_id' => $totals->id,
    //             'item_id' => $value,
    //             'quantity' => $request->data['quantity'][$key],
    //             'unit_price' => $request->data['unit_price'][$key],
    //             'sell_price' => $request->data['sell_price'][$key],
    //             'unit_id' => $request->data['unit_id'][$key],
    //             'discount_value' => $request->data['discount_value'][$key],
    //             'discount_rate' => $request->data['discount_rate'][$key],
    //             'total_price' => $request->data['total_price'][$key],
    //         ]);
    //     }
    //     return redirect()->back()->with(['success' => ' تم  بنجاح']);
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    //     $stores = StStore::get();
    //     $suppliers = Supplier::get();
    //     $treasuries = Treasury::get();
    //     $banks = Bank::get();
    //     $delegates = Representative::get();
    //     $items = IteItem::get();
    //     $units = IteUnit::get();
    //     $totals = ReturnedPurchaseTotal::get();
    //     $returnedPurchases = ReturnedPurchase::where('total_id',$id);
    //     return view('admin.pages.returnedPurchase.create',compact('returnedPurchases','stores','suppliers','treasuries','banks','delegates','items','units','totals'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $totals = ReturnedPurchaseTotal::findOrFail($id);
    //     $totals->update([
    //         'date' => $request->date,
    //         'store_id' => $request->store_id,
    //         'supplier_id' => $request->supplier_id,
    //         'supplier_balance' => $request->supplier_balance,
    //         'treasury_id' => $request->treasury_id,
    //         'bank_id' => $request->bank_id,
    //         'delegate_id' => $request->delegate_id,
    //         'notes' => $request->notes,
    //         'invoice_num' => $request->invoice_num,
    //         'total_after_discount' => $request->total_after_discount,
    //         'paid' => $request->paid,
    //         'rest' => $request->rest,
    //         'last_balance' => $request->last_balance,
    //         'total_before_discount' => $request->total_before_discount,
    //         'discount_ratee' => $request->discount_ratee,
    //         'last_purchasing_price' => $request->last_purchasing_price,
    //         'discount_valuee' => $request->discount_valuee,
    //         'tax_added_value_rate' => $request->tax_added_value_rate,
    //         'transport_cost' => $request->transport_cost,
    //         'purchase_status' => $request->purchase_status,
    //         'top_price' => $request->top_price,
    //         'low_price' => $request->low_price,
    //         'average_price' => $request->average_price,
    //         'payment_getway' => $request->payment_getway,
    //     ]);
    //     ReturnedPurchase::where('total_id', $id)->delete();
    //     foreach ($request->data['item_id'] as $key => $value) {
    //         ReturnedPurchase::create([
    //             'total_id' => $totals->id,
    //             'item_id' => $value,
    //             'quantity' => $request->data['quantity'][$key],
    //             'unit_price' => $request->data['unit_price'][$key],
    //             'sell_price' => $request->data['sell_price'][$key],
    //             'unit_id' => $request->data['unit_id'][$key],
    //             'discount_value' => $request->data['discount_value'][$key],
    //             'discount_rate' => $request->data['discount_rate'][$key],
    //             'total_price' => $request->data['total_price'][$key],
    //         ]);
    //     }
    //     return redirect()->route('returnedPurchase.create')->with(['success' => " تم  بنجاح"]);
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    //     ReturnedPurchaseTotal::where('id',$id)->delete();
    //     ReturnedPurchase::where('total_id',$id)->delete();
    //     return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    // }

    // public function returnedPurchaseAjax($id)
    // {
    //     $returnedPurchase_bank = Account::where('bank_id', $id)->value('amount');
    //     return json_encode($returnedPurchase_bank);
    // }

    // public function treasuryAjax($id)
    // {
    //     $returnedPurchase_treasury = Treasury::where('id', $id)->value('treasury_value');
    //     return json_encode($returnedPurchase_treasury);
    // }
}
