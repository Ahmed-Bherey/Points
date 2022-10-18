<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\BuyBill;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Supplier;
use App\Models\Treasury;
use App\Models\BankProces;
use App\Models\BuyBillTotal;
use Illuminate\Http\Request;
use App\Models\LinlItemStore;
use App\Models\Representative;
use App\Models\TreasuryProces;
use App\Models\PurchasingPrice;
use App\Models\ReturnedPurchase;
use App\Http\Controllers\Controller;
use App\Models\ReturnedPurchaseTotal;

class BuyBillController extends Controller
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
        $stores = StStore::get();
        $suppliers = Supplier::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $delegates = Representative::get();
        $items = IteItem::get();
        $leatest = BuyBillTotal::count();
        $units = IteUnit::get();
        $leatestPrice = PurchasingPrice::query()->latest()->first();
        $totals = BuyBillTotal::get();
        $buybills = BuyBill::get();
        return view('admin.pages.buybill.create', compact('buybills', 'leatest', 'stores', 'leatestPrice', 'suppliers', 'treasuries', 'banks', 'delegates', 'items', 'units', 'totals'));
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
        $bank_balance = Bank::where('id', $request->bank_id)->value(
            'amount'
        );
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value(
            'treasury_value'
        );
        if ($request->payment_getway == 1 && $request->treasury_id == "" && $request->bank_id != "") {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $request->paid,
            ]);
        } elseif ($request->payment_getway == 2 && $request->treasury_id != "" && $request->bank_id == "") {
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $request->paid,
            ]);
        } elseif ($request->treasury_id != "" && $request->bank_id != "") {
            return redirect()->back()->with(['error' => "لا يمكن اختيار البنك والخزينة معا ؛ من فضل اختر احدهما"]);
        } elseif ($request->treasury_id == "" && $request->bank_id == "") {
            return redirect()->back()->with(['error' => "لا يمكن اتمام العملية ؛ من فضلك اختر بنك او خزينة"]);
        }

        $totals = BuyBillTotal::create([
            'date' => $request->date,
            'invoice_num' => $request->invoice_num,
            'store_id' => $request->store_id,
            'payment_getway' => $request->payment_getway,
            'bank_id' => $request->bank_id,
            'treasury_id' => $request->treasury_id,
            'total_before_discount' => $request->total_before_discount,
            'discount_valuee' => $request->discount_valuee,
            'total_after_discount' => $request->total_after_discount,
            'tax_added_value_rate' => $request->tax_added_value_rate,
            'supplier_id' => $request->supplier_id,
            'supplier_balance' => $request->supplier_balance,
            'delegate_id' => $request->delegate_id,
            'notes' => $request->notes,
            'total' => $request->total,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'purchase_status' => $request->purchase_status,
        ]);
        $supplier = Supplier::where('id', '=', $request->supplier_id)->value('balance');
        Supplier::where('id', '=', $request->supplier_id)->update([
            'balance' => $supplier + $request->rest,
        ]);
        $treasuryProces = TreasuryProces::where('treasury_id', $request->treasury_id)->value('debtor');
        $bankProces = BankProces::where('bank_id', $request->bank_id)->value('debtor');
        TreasuryProces::where('treasury_id', $request->treasury_id)->create([
            'treasury_id' => $request->treasury_id,
            'type' => 1,
            'debtor' => $treasuryProces + $request->paid,
        ]);

        BankProces::where('bank_id', $request->bank_id)->create([
            'bank_id' => $request->bank_id,
            'type' => 1,
            'debtor' => $bankProces + $request->paid,
        ]);

        foreach ($request->data['item_id'] as $key => $value) {
            // dd($value);
            BuyBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'purchasing_price' => $request->data['purchasing_price'][$key],
                'sell_price' => $request->data['sell_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value' => $request->data['discount_value'][$key],
                'discount_rate' => $request->data['discount_rate'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
            $from = LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $request->data['item_id'][$key])
                ->value('amount');
            LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $request->data['item_id'][$key])
                ->update([
                    'amount' => $from + $request->data['quantity'][$key],
                ]);
            if ($request->purchase_status == 1) {
                IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                    'pur_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
                $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value('created_at');
                if (isset($PurchasingPrice)) {
                    PurchasingPrice::where('item_id', $value)->update([
                        'item_id' => $value,
                        'quantity' => $request->data['quantity'][$key],
                        'store_id' => $request->store_id,
                        'purchasing_price' => $request->data['unit_price'][$key],
                        'sale_price' => $request->data['sell_price'][$key],
                    ]);
                } else {
                    PurchasingPrice::where('item_id', $value)->create([
                        'item_id' => $value,
                        'quantity' => $request->data['quantity'][$key],
                        'store_id' => $request->store_id,
                        'purchasing_price' => $request->data['unit_price'][$key],
                        'sale_price' => $request->data['sell_price'][$key],
                    ]);
                }
            } elseif ($request->purchase_status == 3) {
                $sale_price = IteItem::where('id', $value)->where('unit_id', $request->data['unit_id'][$key])->value('pur_price');
                IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                    'pur_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
                $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value('created_at');
                if (isset($PurchasingPrice)) {
                    PurchasingPrice::where('item_id', $value)->update([
                        'item_id' => $value,
                        'quantity' => $request->data['quantity'][$key],
                        'store_id' => $request->store_id,
                        'purchasing_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                        'sale_price' => $request->data['sell_price'][$key],
                    ]);
                } else {
                    PurchasingPrice::where('item_id', $value)->create([
                        'item_id' => $value,
                        'quantity' => $request->data['quantity'][$key],
                        'store_id' => $request->store_id,
                        'purchasing_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                        'sale_price' => $request->data['sell_price'][$key],
                    ]);
                }
            }
        }
        return redirect()->back()->with(['success' => ' تم  بنجاح']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    public function ReturnedPurchaseEdit($id)
    {
        $stores = StStore::get();
        $suppliers = Supplier::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $delegates = Representative::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $leatest = BuyBillTotal::count();
        $ReturnedPurchaseTotal = ReturnedPurchaseTotal::get();
        $ReturnedPurchase = ReturnedPurchase::get();
        $totals = BuyBillTotal::find($id);
        $buybills = BuyBill::where('total_id', $id)->with('items')->get();
        return view('admin.pages.returnedPurchase.create', compact('buybills', 'leatest', 'ReturnedPurchaseTotal', 'ReturnedPurchase', 'stores', 'suppliers', 'treasuries', 'banks', 'delegates', 'items', 'units', 'totals'));
    }

    public function ReturnedPurchaseUpdate(Request $request, $id)
    {
        $totals = BuyBillTotal::findOrFail($id);

        $paid = BuyBillTotal::where('supplier_id', $request->supplier_id)->value('rest');
        // $paidData = $paid - $request->rest;
        $supplier = Supplier::where('id', '=', $request->supplier_id)->value('balance');
        Supplier::where('id', '=', $request->supplier_id)->update([
            'balance' => $supplier - $request->rest,
        ]);

        foreach ($request->data['item_id'] as $key => $value) {
            $LinlItemStore = LinlItemStore::where('store_id', $request->store_id)->where('item_id', $value)->value('amount');
            $BuyBill = BuyBill::where('total_id', $id)->where('item_id', $value)->value('quantity');
            $data = $BuyBill - $request->data['quantity'][$key];
            LinlItemStore::where('store_id', $request->store_id)->where('item_id', $value)->update([
                'amount' => $LinlItemStore - $request->data['quantity'][$key],
            ]);

            $BuyBill_paid = BuyBillTotal::where('bank_id', $request->bank_id)->value('paid');
            $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
            $treasury_balance = Treasury::where('id', $request->treasury_id)->value('treasury_value');
            $rasult = $BuyBill_paid - $request->paid;
            if ($request->payment_getway == 1) {
                Bank::where('id', $request->bank_id)->update([
                    'amount' => $bank_balance + $request->paid,
                ]);
                BankProces::where('bank_id', $request->bank_id)->update([
                    'bank_id' => $request->bank_id,
                    'type' => 1,
                    'debtor' => $request->paid,
                ]);
            } elseif ($request->payment_getway == 2) {
                Treasury::where('id', $request->treasury_id)->update([
                    'treasury_value' => $treasury_balance + $request->paid,
                ]);
                TreasuryProces::where('treasury_id', $request->treasury_id)->update([
                    'treasury_id' => $request->treasury_id,
                    'type' => 1,
                    'debtor' => $request->paid,
                ]);
            }

            // $purPrice = IteItem::where('id', $value)->where('unit_id', $request->data['unit_id'][$key])->value('pur_price');
            // $salePrice = IteItem::where('id', $value)->where('unit_id', $request->data['unit_id'][$key])->value('sale_price');
            // $purPriceData = $purPrice - $request->data['unit_price'][$key];
            // $salePriceData = $salePrice - $request->data['sell_price'][$key];
            // PurchasingPrice::where('item_id', $value)->update([
            //     'item_id' => $value,
            //     'purchasing_price' => $purPrice - $purPriceData,
            //     'sale_price' => $salePrice - $salePriceData,
            // ]);

            $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value('quantity');
            $PurchasingPriceData = $PurchasingPrice - $request->data['quantity'][$key];
            if ($request->purchase_status == 1) {
                IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                    'pur_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
                PurchasingPrice::where('item_id', $value)->update([
                    'item_id' => $value,
                    'quantity' => $PurchasingPrice - $PurchasingPriceData,
                    'store_id' => $request->store_id,
                    'purchasing_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
            } elseif ($request->purchase_status == 3) {
                $sale_price = IteItem::where('id', $value)->where('unit_id', $request->data['unit_id'][$key])->value('pur_price');
                IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                    'pur_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
                PurchasingPrice::where('item_id', $value)->update([
                    'item_id' => $value,
                    'quantity' => $PurchasingPrice - $PurchasingPriceData,
                    'store_id' => $request->store_id,
                    'purchasing_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                    'sale_price' => $request->data['sell_price'][$key],
                ]);
            }

            BuyBill::where('total_id', $id)->delete();
            $buybills = BuyBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'purchasing_price' => $request->data['purchasing_price'][$key],
                'sell_price' => $request->data['sell_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value' => $request->data['discount_value'][$key],
                'discount_rate' => $request->data['discount_rate'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);

            $ReturnedPurchaseTotal = ReturnedPurchaseTotal::create([
                'date' => $request->date,
                'store_id' => $request->store_id,
                'supplier_id' => $request->supplier_id,
                'supplier_balance' => $request->supplier_balance,
                'treasury_id' => $request->treasury_id,
                'bank_id' => $request->bank_id,
                'delegate_id' => $request->delegate_id,
                'notes' => $request->notes,
                'invoice_num' => $request->invoice_num,
                'total_after_discount' => $request->total_after_discount,
                'paid' => $request->paid,
                'rest' => $request->rest,
                'last_balance' => $request->last_balance,
                'total_before_discount' => $request->total_before_discount,
                'discount_ratee' => $request->discount_ratee,
                'last_purchasing_price' => $request->last_purchasing_price,
                'discount_valuee' => $request->discount_valuee,
                'tax_added_value_rate' => $request->tax_added_value_rate,
                'transport_cost' => $request->transport_cost,
                'purchase_status' => $request->purchase_status,
                'top_price' => $request->top_price,
                'low_price' => $request->low_price,
                'average_price' => $request->average_price,
                'payment_getway' => $request->payment_getway,
            ]);
            ReturnedPurchase::create([
                'total_id' => $ReturnedPurchaseTotal->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'purchasing_price' => $request->data['purchasing_price'][$key],
                'sell_price' => $request->data['sell_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value' => $request->data['discount_value'][$key],
                'discount_rate' => $request->data['discount_rate'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
        }

        $totals->update([
            'date' => $request->date,
            'store_id' => $request->store_id,
            'supplier_id' => $request->supplier_id,
            'supplier_balance' => $request->supplier_balance,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'delegate_id' => $request->delegate_id,
            'notes' => $request->notes,
            'invoice_num' => $request->invoice_num,
            'total_after_discount' => $request->total_after_discount,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'last_balance' => $request->last_balance,
            'total_before_discount' => $request->total_before_discount,
            'discount_ratee' => $request->discount_ratee,
            'last_purchasing_price' => $request->last_purchasing_price,
            'discount_valuee' => $request->discount_valuee,
            'tax_added_value_rate' => $request->tax_added_value_rate,
            'transport_cost' => $request->transport_cost,
            'purchase_status' => $request->purchase_status,
            'top_price' => $request->top_price,
            'low_price' => $request->low_price,
            'average_price' => $request->average_price,
            'payment_getway' => $request->payment_getway,
        ]);
        return redirect()->route('buybill.create')->with(['success' => " تم  بنجاح"]);
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
        $stores = StStore::get();
        $suppliers = Supplier::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $delegates = Representative::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $leatest = BuyBillTotal::count();
        $currentDate = PurchasingPrice::query()->latest()->first();
        $totals = BuyBillTotal::find($id);
        $buybills = BuyBill::where('total_id', $id)->get();
        return view('admin.pages.buybill.edit', compact('buybills', 'currentDate', 'leatest', 'stores', 'suppliers', 'treasuries', 'banks', 'delegates', 'items', 'units', 'totals'));
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
        $totals = BuyBillTotal::find($id);
        foreach ($request->data['item_id'] as $key => $value) {
            $LinlItemStore = LinlItemStore::where(
                'store_id',
                $request->store_id
            )
                ->where('item_id', $value)
                ->value('amount');
            $BuyBill = BuyBill::where('total_id', $id)
                ->where('item_id', $value)
                ->value('quantity');
            $data = $BuyBill - $request->data['quantity'][$key];
            LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $value)
                ->update([
                    'amount' => $LinlItemStore - $data,
                ]);
            BuyBill::where('total_id', $id)->delete();
            $buybills = BuyBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'purchasing_price' => $request->data['purchasing_price'][$key],
                'sell_price' => $request->data['sell_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value' => $request->data['discount_value'][$key],
                'discount_rate' => $request->data['discount_rate'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
            $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value('quantity');
            $PurchasingPriceData = $PurchasingPrice - $request->data['quantity'][$key];
            PurchasingPrice::where('item_id', $value)->update([
                'item_id' => $value,
                'quantity' => $PurchasingPrice - $PurchasingPriceData,
                'store_id' => $request->store_id,
                'purchasing_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sell_price'][$key],
            ]);
        }
        $BuyBill_paid = BuyBillTotal::where(
            'bank_id',
            $request->bank_id
        )->value('paid');
        $bank_balance = Bank::where('id', $request->bank_id)->value(
            'amount'
        );
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value(
            'treasury_value'
        );
        $rasult = $BuyBill_paid - $request->paid;
        if ($request->payment_getway == 1) {
            $bankProces = BankProces::where('bank_id', $request->bank_id)->value('debtor');
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $rasult,
            ]);
            BankProces::where('bank_id', $request->bank_id)->update([
                'bank_id' => $request->bank_id,
                'type' => 1,
                'debtor' => $request->paid,
            ]);
        } elseif ($request->payment_getway == 2) {
            $treasuryProces = TreasuryProces::where('treasury_id', $request->treasury_id)->value('debtor');
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $rasult,
            ]);
            TreasuryProces::where('treasury_id', $request->treasury_id)->update([
                'treasury_id' => $request->treasury_id,
                'type' => 1,
                'debtor' => $request->paid,
            ]);
        }

        $buyBillRest = BuyBillTotal::where('store_id', $request->store_id)->where('supplier_id', $request->supplier_id)->value('rest');
        $restData = $buyBillRest - $request->rest;
        $supplier = Supplier::where('id', '=', $request->supplier_id)->value('balance');
        Supplier::where('id', '=', $request->supplier_id)->update([
            'balance' => $supplier - $restData,
        ]);

        if ($request->purchase_status == 1) {
            IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                'pur_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sell_price'][$key],
            ]);
            PurchasingPrice::where('item_id', $value)->update([
                'item_id' => $value,
                'purchasing_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sell_price'][$key],
            ]);
        } elseif ($request->purchase_status == 3) {
            $sale_price = IteItem::where('id', $value)->where('unit_id', $request->data['unit_id'][$key])->value('pur_price');
            IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
                'pur_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                'sale_price' => $request->data['sell_price'][$key],
            ]);
            PurchasingPrice::where('item_id', $value)->update([
                'item_id' => $value,
                'purchasing_price' => ($sale_price + $request->data['unit_price'][$key]) / 2,
                'sale_price' => $request->data['sell_price'][$key],
            ]);
        }

        $totals->update([
            'date' => $request->date,
            'invoice_num' => $request->invoice_num,
            'store_id' => $request->store_id,
            'payment_getway' => $request->payment_getway,
            'bank_id' => $request->bank_id,
            'treasury_id' => $request->treasury_id,
            'total_before_discount' => $request->total_before_discount,
            'discount_valuee' => $request->discount_valuee,
            'total_after_discount' => $request->total_after_discount,
            'tax_added_value_rate' => $request->tax_added_value_rate,
            'supplier_id' => $request->supplier_id,
            'supplier_balance' => $request->supplier_balance,
            'delegate_id' => $request->delegate_id,
            'notes' => $request->notes,
            'total' => $request->total,
            'paid' => $request->paid,
            'rest' => $request->rest,
            'purchase_status' => $request->purchase_status,
        ]);
        return redirect()->route('buybill.create')->with(['success' => ' تم  بنجاح']);
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
        $buyBillTotal = BuyBillTotal::where('id', $id)->find($id);
        $store_id = BuyBillTotal::where('id', $id)->value('store_id');
        foreach (BuyBill::where('total_id', $id)->get() as $key => $value) {
            $LinlItemStore = LinlItemStore::where('store_id', $store_id)->where('item_id', $value->item_id)->value('amount');
            $BuyBill = BuyBill::where('total_id', $id)->where('item_id', $value->item_id)->value('quantity');
            LinlItemStore::where('store_id', $store_id)->where('item_id', $value->item_id)->update([
                'amount' => $LinlItemStore - $BuyBill,
            ]);
        }
        $paid = BuyBillTotal::where('id', $id)->value('paid');
        $treasury_id = BuyBillTotal::where('id', $id)->value('treasury_id');
        $treasuty_balance = Treasury::where('id', $treasury_id)->value('treasury_value');
        $bank_id = BuyBillTotal::where('id', $id)->value('bank_id');
        $banl_balance = Bank::where('id', $bank_id)->value('amount');
        if ($buyBillTotal->payment_getway == 1) {
            Bank::where('id', $bank_id)->update([
                'amount' => $banl_balance + $paid,
            ]);
        } else {
            Treasury::where('id', $treasury_id)->update([
                'treasury_value' => $treasuty_balance + $paid,
            ]);
        }
        $rest = BuyBillTotal::where('id', $id)->value('rest');
        $supplier_id = BuyBillTotal::where('id', $id)->value('supplier_id');
        $supplier_balance = Supplier::where('id', $supplier_id)->value('balance');
        Supplier::where('id', $supplier_id)->update([
            'balance' => $supplier_balance - $rest,
        ]);
        BuyBillTotal::where('id', $id)->delete();
        BuyBill::where('total_id', $id)->delete();
        ReturnedPurchaseTotal::where('id', $id)->delete();
        ReturnedPurchase::where('total_id', $id)->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }

    public function buybillAjax($id)
    {
        $buybill_balance = Treasury::where('id', $id)->value('treasury_value');
        return json_encode($buybill_balance);
    }

    public function bankAjax($id)
    {
        $buybill_bank_balance = Bank::where('id', $id)->value('amount');
        return json_encode($buybill_bank_balance);
    }

    public function itemAjax($id)
    {
        $storeItem = LinlItemStore::where('store_id', $id)->with('items.unites')->get();
        return json_encode($storeItem);
    }

    public function unitAjax($id)
    {
        $unitItem = IteItem::where('unit_id', $id)->with('unites')->get();
        return json_encode($unitItem);
    }

    public function priceAjax($id)
    {
        $price = PurchasingPrice::where('item_id', $id)->value('purchasing_price');
        return json_encode($price);
    }

    public function supplierAjax($id)
    {
        $supplierAjax = Supplier::where('id', $id)->value('balance');
        return json_encode($supplierAjax);
    }

    public function salePriceAjax($id)
    {
        $salePriceAjax = IteItem::where('id', $id)->value('sale_price');
        return json_encode($salePriceAjax);
    }

    public function unitPriceAjax($id)
    {
        $unitPriceAjax = IteItem::where('id', $id)->value('pur_price');
        return json_encode($unitPriceAjax);
    }

    public function search()
    {
        $search_text = $_GET["query"];
        $buyBillTotals = BuyBillTotal::where('invoice_num', 'LIKE', '%' . $search_text . '%')->get();
        return view('admin.searchBar', compact('buyBillTotals'));
    }
}


// $treasuryProces = TreasuryProces::where('treasury_id', $request->treasury_id)->where('supplier_id',$request->supplier_id)->value('debtor');
//         $treasuryProcesData = $treasuryProces - $request->paid;
//         $bankProces = BankProces::where('bank_id', $request->bank_id)->where('supplier_id',$request->supplier_id)->value('debtor');
//         $bankProcesData = $bankProces - $request->paid;
//         TreasuryProces::where('treasury_id', $request->treasury_id)->where('supplier_id',$request->supplier_id)->update([
//             'treasury_id' => $request->treasury_id,
//             'supplier_id' => $request->supplier_id,
//             'type' => 1,
//             'debtor' => $treasuryProces - $treasuryProcesData,
//         ]);

//         BankProces::where('bank_id', $request->bank_id)->where('supplier_id',$request->supplier_id)->update([
//             'bank_id' => $request->bank_id,
//             'supplier_id' => $request->supplier_id,
//             'type' => 1,
//             'debtor' => $bankProces - $bankProcesData,
//         ]);
