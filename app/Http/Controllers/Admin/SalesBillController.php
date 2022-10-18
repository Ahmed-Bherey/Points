<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Client;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Treasury;
use App\Models\SalesBill;
use App\Models\BankProces;
use App\Models\SalesReturn;
use Illuminate\Http\Request;
use App\Models\LinlItemStore;
use App\Models\Representative;
use App\Models\TotalSalesBill;
use App\Models\TreasuryProces;
use App\Models\PurchasingPrice;
use App\Models\ReturnedSalesBill;
use App\Http\Controllers\Controller;
use App\Models\ReturnedSalesBillTotal;

class SalesBillController extends Controller
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
        $units = IteUnit::get();
        $items = IteItem::get();
        $clients = Client::get();
        $stores = StStore::get();
        $representatives = Representative::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $saleBills = SalesBill::get();
        $leatest = TotalSalesBill::count();
        $totalBuyBills = TotalSalesBill::get();
        return view(
            'admin.pages.salesBill.create',
            compact(
                'totalBuyBills',
                'leatest',
                'saleBills',
                'items',
                'units',
                'clients',
                'stores',
                'representatives',
                'banks',
                'treasuries'
            )
        );
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
        // $client = Client::where('id', '=', $request->client_id)->value('balance');
        // dd($request->rest);
        // exit();
        $totals = TotalSalesBill::create([
            'date' => $request->date,
            'client_id' => $request->client_id,
            'representative_id' => $request->representative_id,
            'bill_num' => $request->bill_num,
            'store_id' => $request->store_id,
            'payment_getway' => $request->payment_getway,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'notes' => $request->notes,
            'total_before_discount' => $request->total_before_discount,
            'discount_value' => $request->discount_value,
            'total_after_discount' => $request->total_after_discount,
            'added_tax_value' => $request->added_tax_value,
            'total' => $request->total,
            'paid' => $request->paid,
            'rest' => $request->rest,
        ]);
        foreach ($request->data['item_id'] as $key => $value) {
            SalesBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value2' => $request->data['discount_value2'][$key],
                'discount_rate2' => $request->data['discount_rate2'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);

            $LinlItemStore = LinlItemStore::where(
                'store_id',
                $request->store_id
            )
                ->where('item_id', $value)
                ->value('amount');
            LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $value)
                ->update([
                    'amount' =>
                        $LinlItemStore - $request->data['quantity'][$key],
                ]);
            IteItem::where('id', '=', $value)
                ->where('unit_id', $request->data['unit_id'][$key])
                ->update([
                    'pur_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sale_price'][$key],
                ]);
            $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value(
                'created_at'
            );
            if (isset($PurchasingPrice)) {
                PurchasingPrice::where('item_id', $value)->update([
                    'item_id' => $value,
                    'store_id' => $request->store_id,
                    'quantity' => $request->data['quantity'][$key],
                    'purchasing_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sale_price'][$key],
                ]);
            } else {
                PurchasingPrice::where('item_id', $value)->create([
                    'item_id' => $value,
                    'quantity' => $request->data['quantity'][$key],
                    'store_id' => $request->store_id,
                    'purchasing_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sale_price'][$key],
                ]);
            }
        }
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value(
            'treasury_value'
        );
        if ($request->payment_getway == 1) {
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $request->paid,
            ]);
        } elseif ($request->payment_getway == 2) {
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $request->paid,
            ]);
        }
        $treasuryProces = TreasuryProces::where(
            'treasury_id',
            $request->treasury_id
        )->value('creditor');
        $bankProces = BankProces::where('bank_id', $request->bank_id)->value(
            'creditor'
        );
        TreasuryProces::where('treasury_id', $request->treasury_id)->create([
            'treasury_id' => $request->treasury_id,
            'type' => 2,
            'creditor' => $treasuryProces + $request->paid,
        ]);

        BankProces::where('bank_id', $request->bank_id)->create([
            'bank_id' => $request->bank_id,
            'type' => 2,
            'creditor' => $bankProces + $request->paid,
        ]);
        $client = Client::where('id', '=', $request->client_id)->value(
            'balance'
        );
        Client::where('id', '=', $request->client_id)->update([
            'balance' => $client - $request->rest,
        ]);
        return redirect()
            ->back()
            ->with(['success' => ' تم  بنجاح']);
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

    public function ReturnedSalesEdit($id)
    {
        $units = IteUnit::get();
        $items = IteItem::get();
        $clients = Client::get();
        $stores = StStore::get();
        $representatives = Representative::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $leatest = TotalSalesBill::count();
        $returnedSalesBillTotal = ReturnedSalesBillTotal::get();
        $returnedSalesBill = ReturnedSalesBill::get();
        $totals = TotalSalesBill::find($id);
        $saleBills = SalesBill::where('total_id', $id)->get();
        return view(
            'admin.pages.salesBill.returnSaleBillCreate',
            compact(
                'totals',
                'returnedSalesBillTotal',
                'returnedSalesBill',
                'leatest',
                'saleBills',
                'items',
                'units',
                'clients',
                'stores',
                'representatives',
                'banks',
                'treasuries'
            )
        );
    }

    public function ReturnedSalesUpdate(Request $request, $id)
    {
        $totals = TotalSalesBill::find($id);
        foreach ($request->data['item_id'] as $key => $value) {
            $LinlItemStore = LinlItemStore::where(
                'store_id',
                $request->store_id
            )
                ->where('item_id', $value)
                ->value('amount');
            $quantity = SalesBill::where('total_id', $id)
                ->where('item_id', $value)
                ->value('quantity');
            LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $value)
                ->update([
                    'amount' =>
                        $LinlItemStore + $request->data['quantity'][$key],
                ]);
            IteItem::where('id', '=', $value)
                ->where('unit_id', $request->data['unit_id'][$key])
                ->update([
                    'pur_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sale_price'][$key],
                ]);
            $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value(
                'quantity'
            );
            $PurchasingPriceData =
                $PurchasingPrice - $request->data['quantity'][$key];
            PurchasingPrice::where('item_id', $value)->update([
                'item_id' => $value,
                'quantity' => $PurchasingPrice - $PurchasingPriceData,
                'store_id' => $request->store_id,
                'purchasing_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
            ]);
            $saleBills = SalesBill::where('total_id', $id)->delete();
            SalesBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value2' => $request->data['discount_value2'][$key],
                'discount_rate2' => $request->data['discount_rate2'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
            $ReturnedSalesBillTotal = ReturnedSalesBillTotal::create([
                'date' => $request->date,
                'client_id' => $request->client_id,
                'representative_id' => $request->representative_id,
                'bill_num' => $request->bill_num,
                'store_id' => $request->store_id,
                'payment_getway' => $request->payment_getway,
                'treasury_id' => $request->treasury_id,
                'bank_id' => $request->bank_id,
                'notes' => $request->notes,
                'total_before_discount' => $request->total_before_discount,
                'discount_value' => $request->discount_value,
                'total_after_discount' => $request->total_after_discount,
                'added_tax_value' => $request->added_tax_value,
                'total' => $request->total,
                'paid' => $request->paid,
                'rest' => $request->rest,
            ]);
            ReturnedSalesBill::create([
                'total_id' => $ReturnedSalesBillTotal->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value2' => $request->data['discount_value2'][$key],
                'discount_rate2' => $request->data['discount_rate2'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
        }
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value(
            'treasury_value'
        );
        $paid = TotalSalesBill::where('id', $id)
            ->where('client_id', $request->client_id)
            ->value('paid');
        $paidData = $paid - $request->paid;
        if ($request->payment_getway == 1) {
            $bankProces = BankProces::where(
                'bank_id',
                $request->bank_id
            )->value('creditor');
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance + $request->paid,
            ]);
            BankProces::where('bank_id', $request->bank_id)->create([
                'bank_id' => $request->bank_id,
                'type' => 2,
                'creditor' => $request->paid,
            ]);
        } elseif ($request->payment_getway == 2) {
            $treasuryProces = TreasuryProces::where(
                'treasury_id',
                $request->treasury_id
            )->value('creditor');
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance + $request->paid,
            ]);
            TreasuryProces::where('treasury_id', $request->treasury_id)->create(
                [
                    'treasury_id' => $request->treasury_id,
                    'type' => 2,
                    'creditor' => $request->paid,
                ]
            );
        }
        $rest = TotalSalesBill::where('id', $id)
            ->where('client_id', $request->client_id)
            ->value('rest');
        $client = Client::where('id', '=', $request->client_id)->value(
            'balance'
        );
        Client::where('id', '=', $request->client_id)->update([
            'balance' => $client + $request->rest,
        ]);

        $totals->update([
            'date' => $request->date,
            'client_id' => $request->client_id,
            'representative_id' => $request->representative_id,
            'bill_num' => $request->bill_num,
            'store_id' => $request->store_id,
            'payment_getway' => $request->payment_getway,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'notes' => $request->notes,
            'total_before_discount' => $request->total_before_discount,
            'discount_value' => $request->discount_value,
            'total_after_discount' => $request->total_after_discount,
            'added_tax_value' => $request->added_tax_value,
            'total' => $request->total,
            'paid' => $request->paid,
            'rest' => $request->rest,
        ]);
        return redirect()
            ->route('salesBill.create')
            ->with(['success' => ' تم  التحديث بنجاح']);
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
        $units = IteUnit::get();
        $items = IteItem::get();
        $clients = Client::get();
        $stores = StStore::get();
        $representatives = Representative::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $leatest = TotalSalesBill::count();
        $totals = TotalSalesBill::find($id);
        $saleBills = SalesBill::where('total_id', $id)->get();
        return view(
            'admin.pages.salesBill.edit',
            compact(
                'totals',
                'leatest',
                'saleBills',
                'items',
                'units',
                'clients',
                'stores',
                'representatives',
                'banks',
                'treasuries'
            )
        );
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
        // $paid = TotalSalesBill::where('id', $id)->where('client_id',$request->client_id)->value('paid');
        // dd($paid);
        // exit();
        $totals = TotalSalesBill::find($id);
        foreach ($request->data['item_id'] as $key => $value) {
            $LinlItemStore = LinlItemStore::where(
                'store_id',
                $request->store_id
            )
                ->where('item_id', $value)
                ->value('amount');
            $quantity = SalesBill::where('total_id', $id)
                ->where('item_id', $value)
                ->value('quantity');
            $data = $quantity - $request->data['quantity'][$key];
            LinlItemStore::where('store_id', $request->store_id)
                ->where('item_id', $value)
                ->update([
                    'amount' => $LinlItemStore + $data,
                ]);
            IteItem::where('id', '=', $value)
                ->where('unit_id', $request->data['unit_id'][$key])
                ->update([
                    'pur_price' => $request->data['unit_price'][$key],
                    'sale_price' => $request->data['sale_price'][$key],
                ]);
            $PurchasingPrice = PurchasingPrice::where('item_id', $value)->value(
                'quantity'
            );
            $PurchasingPriceData =
                $PurchasingPrice - $request->data['quantity'][$key];
            PurchasingPrice::where('item_id', $value)->update([
                'item_id' => $value,
                'quantity' => $PurchasingPrice - $PurchasingPriceData,
                'store_id' => $request->store_id,
                'purchasing_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
            ]);
            $saleBills = SalesBill::where('total_id', $id)->delete();
            SalesBill::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'quantity' => $request->data['quantity'][$key],
                'unit_price' => $request->data['unit_price'][$key],
                'sale_price' => $request->data['sale_price'][$key],
                'unit_id' => $request->data['unit_id'][$key],
                'discount_value2' => $request->data['discount_value2'][$key],
                'discount_rate2' => $request->data['discount_rate2'][$key],
                'total_price' => $request->data['total_price'][$key],
            ]);
        }
        $bank_balance = Bank::where('id', $request->bank_id)->value('amount');
        $treasury_balance = Treasury::where('id', $request->treasury_id)->value(
            'treasury_value'
        );
        $paid = TotalSalesBill::where('id', $id)
            ->where('client_id', $request->client_id)
            ->value('paid');
        $paidData = $paid - $request->paid;
        if ($request->payment_getway == 1) {
            $bankProces = BankProces::where(
                'bank_id',
                $request->bank_id
            )->value('creditor');
            Bank::where('id', $request->bank_id)->update([
                'amount' => $bank_balance - $paidData,
            ]);
            BankProces::where('bank_id', $request->bank_id)->create([
                'bank_id' => $request->bank_id,
                'type' => 2,
                'creditor' => $request->paid,
            ]);
        } elseif ($request->payment_getway == 2) {
            $treasuryProces = TreasuryProces::where(
                'treasury_id',
                $request->treasury_id
            )->value('creditor');
            Treasury::where('id', $request->treasury_id)->update([
                'treasury_value' => $treasury_balance - $paidData,
            ]);
            TreasuryProces::where('treasury_id', $request->treasury_id)->create(
                [
                    'treasury_id' => $request->treasury_id,
                    'type' => 2,
                    'creditor' => $request->paid,
                ]
            );
        }
        $rest = TotalSalesBill::where('id', $id)
            ->where('client_id', $request->client_id)
            ->value('rest');
        $restData = $rest - $request->rest;
        $client = Client::where('id', '=', $request->client_id)->value(
            'balance'
        );
        Client::where('id', '=', $request->client_id)->update([
            'balance' => $client + $restData,
        ]);

        $totals->update([
            'date' => $request->date,
            'client_id' => $request->client_id,
            'representative_id' => $request->representative_id,
            'bill_num' => $request->bill_num,
            'store_id' => $request->store_id,
            'payment_getway' => $request->payment_getway,
            'treasury_id' => $request->treasury_id,
            'bank_id' => $request->bank_id,
            'notes' => $request->notes,
            'total_before_discount' => $request->total_before_discount,
            'discount_value' => $request->discount_value,
            'total_after_discount' => $request->total_after_discount,
            'added_tax_value' => $request->added_tax_value,
            'total' => $request->total,
            'paid' => $request->paid,
            'rest' => $request->rest,
        ]);
        return redirect()
            ->route('salesBill.create')
            ->with(['success' => ' تم  التحديث بنجاح']);
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
        // $bank_id = TotalSalesBill::where('id', $id)->value('bank_id');
        // $banl_balance = Bank::where('id', $bank_id)->value('amount');
        // dd($banl_balance);
        // exit();
        $totalSalesBill = TotalSalesBill::where('id', $id)->find($id);
        $store_id = TotalSalesBill::where('id', $id)->value('store_id');
        foreach (SalesBill::where('total_id', $id)->get() as $key => $value) {
            $LinlItemStore = LinlItemStore::where('store_id', $store_id)
                ->where('item_id', $value->item_id)
                ->value('amount');
            $SalesBill = SalesBill::where('total_id', $id)
                ->where('item_id', $value->item_id)
                ->value('quantity');
            LinlItemStore::where('store_id', $store_id)
                ->where('item_id', $value->item_id)
                ->update([
                    'amount' => $LinlItemStore + $SalesBill,
                ]);
        }
        $paid = TotalSalesBill::where('id', $id)->value('paid');
        $bank_id = TotalSalesBill::where('id', $id)->value('bank_id');
        $treasury_id = TotalSalesBill::where('id', $id)->value('treasury_id');
        $banl_balance = Bank::where('id', $bank_id)->value('amount');
        $treasuty_balance = Treasury::where('id', $treasury_id)->value('treasury_value');
        if ($totalSalesBill->payment_getway == 1) {
            Bank::where('id', $bank_id)->update([
                'amount' => $banl_balance - $paid,
            ]);
        } else {
            Treasury::where('id', $treasury_id)->update([
                'treasury_value' => $treasuty_balance - $paid,
            ]);
        }
        $rest = TotalSalesBill::where('id', $id)->value('rest');
        $client_id = TotalSalesBill::where('id', $id)->value('client_id');
        $client = Client::where('id', $client_id)->value('balance');
        Client::where('id', $client_id)->update([
            'balance' => $client + $rest,
        ]);
        TotalSalesBill::where('id', $id)->delete();
        SalesBill::where('total_id', $id)->delete();
        return redirect()
            ->back()
            ->with(['success' => 'تم الحذف بنجاح']);
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

    public function itemAjax($id)
    {
        $storeItem = LinlItemStore::where('store_id', $id)
            ->with('items.unites')
            ->get();
        return json_encode($storeItem);
    }

    public function unitAjax($id)
    {
        $unitItem = IteItem::where('unit_id', $id)
            ->with('unites')
            ->get();
        return json_encode($unitItem);
    }
}

// $totals = TotalSalesBill::find($id);
//         $saleBills = SalesBill::where('total_id', $id)->delete();
//         foreach ($request->data["item_id"] as $key => $value){
//             SalesBill::create([
//                 'total_id' => $totals->id,
//                 'item_id' => $value,
//                 'quantity' => $request->data['quantity'][$key],
//                 'unit_price' => $request->data['unit_price'][$key],
//                 'sale_price' => $request->data['sale_price'][$key],
//                 'unit_id' => $request->data['unit_id'][$key],
//                 'discount_value2' => $request->data['discount_value2'][$key],
//                 'discount_rate2' => $request->data['discount_rate2'][$key],
//                 'total_price' => $request->data['total_price'][$key],
//             ]);
//             $saleBillAmount = SalesBill::where('total_id',$id)->where('item_id', $value)->where('unit_id',$request->data['unit_id'][$key])->value('quantity');
//             $data = $saleBillAmount - $request->data['quantity'][$key];
//             $LinlItemStore = LinlItemStore::where('store_id', $request->store_id)->where('item_id', $value)->value('amount');
//             dd($saleBillAmount);
//             LinlItemStore::where('store_id', $request->store_id)->where('item_id', $value)->update([
//                     'amount' => $LinlItemStore - $data,
//                 ]);
//             IteItem::where('id', '=', $value)->where('unit_id', $request->data['unit_id'][$key])->update([
//                 'pur_price' => $request->data['unit_price'][$key],
//                 'sale_price' => $request->data['sale_price'][$key],
//             ]);
//         }
//         $totals->update([
//             'date1' => $request->date1,
//             'bill_num' => $request->bill_num,
//             'buy_type' => $request->buy_type,
//             'bill_type' => $request->bill_type,
//             'client_id' => $request->client_id,
//             'representative_id' => $request->representative_id,
//             'store_id' => $request->store_id,
//             'date2' => $request->date2,
//             'target' => $request->target,
//             'from' => $request->from,
//             'treasury_id' => $request->treasury_id,
//             'bank_id' => $request->bank_id,
//             'bill_items_num' => $request->bill_items_num,
//             'bill_quantity_num' => $request->bill_quantity_num,
//             'notes' => $request->notes,
//             'previous_balance' => $request->previous_balance,
//             'final_balance' => $request->final_balance,
//             'payment_type' => $request->payment_type,
//             'statement_type' => $request->statement_type,
//             'total_before_discount' => $request->total_before_discount,
//             'discount_rate1' => $request->discount_rate1,
//             'discount_value1' => $request->discount_value1,
//             'added_tax_value' => $request->added_tax_value,
//             'added_tax_rate' => $request->added_tax_rate,
//             'transportation_cost' => $request->transportation_cost,
//             'compound_tax' => $request->compound_tax,
//             'total_after_discount' => $request->total_after_discount,
//             'paid' => $request->paid,
//             'rest' => $request->rest,
//             'added_rate' => $request->added_rate,
//         ]);
