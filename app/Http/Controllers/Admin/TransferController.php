<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\AddItem;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Transfer;
use Illuminate\Http\Request;
use App\Models\LinlItemStore;
use App\Models\EqualizQuantite;
use App\Http\Controllers\Controller;
use App\Models\Total;
use App\Models\TotalTransfer;

class TransferController extends Controller
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
        $storesFrom = StStore::get();
        $storesTo = StStore::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $totals = TotalTransfer::get();
        $transfers = Transfer::get();
        return view('admin.pages.transfer.create', compact('transfers', 'totals', 'storesFrom', 'storesTo', 'items', 'units'));
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

        foreach ($request->data['item_id'] as $key => $value) {
            $from = LinlItemStore::where('store_id', $request->storeFrom_id)->where('item_id',$value)->value('amount');

            $StStore = LinlItemStore::where('store_id', $request->storeTo_id)->where('item_id',$value)->get();

            if ($StStore->count() < 1) {
                LinlItemStore::create([
                    'store_id' => $request->storeTo_id,
                    'item_id' => $value,
                    'unit_id' => $request->data['unit_id'][$key],
                    'amount' =>0,
                ]);
            }
            if ($request->data['quantity'][$key] <= $from) {
                LinlItemStore::where('store_id', $request->storeFrom_id)->where('item_id',$value)->update([
                    'amount' => $from - $request->data['quantity'][$key],
                ]);
                $to = LinlItemStore::where('store_id', $request->storeTo_id)->where('item_id',$value)->value('amount');

                LinlItemStore::where('store_id', $request->storeTo_id)->where('item_id',$value)->update([
                    'amount' => $to + $request->data['quantity'][$key],
                ]);

                $totals = TotalTransfer::create([
                    'date' => $request->date,
                    'storeFrom_id' => $request->storeFrom_id,
                    'storeTo_id' => $request->storeTo_id,
                ]);

                Transfer::create([
                    'total_id' => $totals->id,
                    'storeFrom_id' => $request->storeFrom_id,
                    'storeTo_id' => $request->storeTo_id,
                    'item_id' => $value,
                    'unit_id' => $request->data['unit_id'][$key],
                    'quantity' => $request->data['quantity'][$key],
                    'note' => $request->note,
                ]);

                AddItem::create([
                    'date' => $request->date,
                    'item_id' => $request->storeTo_id,
                    'quantity' => $request->quantity,
                    'notes' => $request->note,
                ]);

                return redirect()->back()->with(['success' => ' تم  بنجاح']);
            } else {
                return redirect()->back()->with(['error' => ' فشل التحويل الكمية لا تسمح']);
            }
        }
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
        $storesFrom = StStore::get();
        $storesTo = StStore::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $totals = TotalTransfer::findOrFail($id);
        $transfers = Transfer::where('total_id', $id)->with('items')->get();
        return view('admin.pages.transfer.edit', compact('transfers', 'totals', 'storesFrom', 'storesTo', 'items', 'units'));
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
        $totals = TotalTransfer::findOrFail($id);
        foreach ($request->data['item_id'] as $key => $value) {
            $tarnsfer_quantity = Transfer::where('total_id', $id)->where('storeFrom_id', $request->storeFrom_id)->where('storeTo_id', $request->storeTo_id)->value('quantity');
            $from = LinlItemStore::where('store_id', $request->storeFrom_id)->where('item_id',$value)->value('amount');
            $to = LinlItemStore::where('store_id', $request->storeTo_id)->where('item_id',$value)->value('amount');
            $data = $tarnsfer_quantity - $request->data['quantity'][$key];
            LinlItemStore::where('store_id', $request->storeFrom_id)->where('item_id',$value)->update([
                'amount' => $from + $data,
            ]);
            LinlItemStore::where('store_id', $request->storeTo_id)->where('item_id',$value)->update([
                'amount' => $to - $data,
            ]);
            Transfer::where('total_id', $id)->delete();
            Transfer::create([
                'total_id' => $totals->id,
                'storeFrom_id' => $request->storeFrom_id,
                'storeTo_id' => $request->storeTo_id,
                'item_id' => $value,
                'unit_id' => $request->data['unit_id'][$key],
                'quantity' => $request->data['quantity'][$key],
                'note' => $request->note,
            ]);
        }
        $totals->update([
            'date' => $request->date,
            'storeFrom_id' => $request->storeFrom_id,
            'storeTo_id' => $request->storeTo_id,
        ]);
        return redirect()->route('transfer.create')->with(['success' => ' تم  بنجاح']);
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
        $storeFrom_id = TotalTransfer::where('id', $id)->value('storeFrom_id');
        $storeTo_id = TotalTransfer::where('id', $id)->value('storeTo_id');
        foreach (Transfer::where('total_id', $id)->get() as $key => $value) {
            $from = LinlItemStore::where('store_id', $storeFrom_id)->where('item_id',$value)->value('amount');
            $to = LinlItemStore::where('store_id', $storeTo_id)->where('item_id',$value)->value('amount');
            $tarnsfer_quantity = Transfer::where('total_id', $id)->where('storeFrom_id', $storeFrom_id)->where('storeTo_id', $storeTo_id)->value('quantity');
            LinlItemStore::where('store_id', $storeFrom_id)->where('item_id',$value)->update([
                'amount' => $from + $tarnsfer_quantity,
            ]);
            LinlItemStore::where('store_id', $storeTo_id)->where('item_id',$value)->update([
                'amount' => $to - $tarnsfer_quantity,
            ]);
        }
        TotalTransfer::where('id', $id)->delete();
        Transfer::where('total_id', $id)->delete();
        return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);
    }

    public function storeAjax($id)
    {
        $storeItem = LinlItemStore::where('store_id', $id)->with('items')->get();
        return json_encode($storeItem);
    }

    public function itemAjax($store_id, $id)
    {
        $storeUnits = LinlItemStore::where('store_id', $store_id)->where('id', $id)->with('units')->get();
        return json_encode($storeUnits);
    }

    // public function itemAjax($id)
    // {
    //     $units = IteItem::where('unit_id', $id)->with('unites')->get();
    //     return json_encode($units);
    // }
}
