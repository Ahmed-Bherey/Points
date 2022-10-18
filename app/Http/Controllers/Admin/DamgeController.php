<?php

namespace App\Http\Controllers\Admin;

use App\Models\Damge;
use App\Models\IteItem;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\Totaldamge;
use Illuminate\Http\Request;
use App\Models\LinlItemStore;
use App\Http\Controllers\Controller;

class DamgeController extends Controller
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
        $items = IteItem::get();
        $units = IteUnit::get();
        $totals = Totaldamge::get();
        $damges = Damge::get();
        return view('admin.pages.damge.create', compact('damges', 'totals', 'stores', 'items', 'units'));
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
        $totals = Totaldamge::create([
            'date' => $request->date,
            'store_id' => $request->store_id,
            'note' => $request->note,
        ]);
        foreach ($request->data["items_id"] as $key => $value) {
            Damge::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'unit_id' => $request->data['unit_id'][$key],
                'quantity' => $request->data['quantity'][$key],
                'price' => $request->data['price'][$key],
            ]);
            $linkItemStore = LinlItemStore::where('store_id', $request->store_id)->value('amount');
            LinlItemStore::where('store_id', $request->store_id)->update([
                'amount' => $linkItemStore - $request->data['quantity'][$key],
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
        $stores = StStore::get();
        $items = IteItem::get();
        $units = IteUnit::get();
        $totals = Totaldamge::findOrFail($id);
        $damges = Damge::where('total_id', $id)->with('items')->get();
        return view('admin.pages.damge.edit', compact('damges', 'totals', 'stores', 'items', 'units'));
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
        $totals = Totaldamge::findOrFail($id);
        foreach ($request->data["items_id"] as $key => $value) {
            $linkItemStore = LinlItemStore::where('store_id', $request->store_id)->value('amount');
            $damge_amount = Damge::where('total_id', $id)->value('quantity');
            $data = $damge_amount - $request->data['quantity'][$key];
            LinlItemStore::where('store_id', $request->store_id)->update([
                'amount' => $linkItemStore + $data,
            ]);
            Damge::where('total_id', $id)->delete();
            Damge::create([
                'total_id' => $totals->id,
                'item_id' => $value,
                'unit_id' => $request->data['unit_id'][$key],
                'quantity' => $request->data['quantity'][$key],
                'price' => $request->data['price'][$key],
            ]);
        }
        $totals->update([
            'date' => $request->date,
            'store_id' => $request->store_id,
            'note' => $request->note,
        ]);
        return redirect()->route('damge.create')->with(['success' => " تم  بنجاح"]);
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
        $store_id = Totaldamge::where('id', $id)->value('store_id');
        foreach (Damge::where('total_id', $id)->get() as $key => $value) {
            $linkItemStore = LinlItemStore::where('store_id', $store_id)->where('unit_id', $value->unit_id)->value('amount');
            $damge_amount = Damge::where('total_id', $id)->where('item_id', $value->item_id)->where('unit_id', $value->unit_id)->value('quantity');
            LinlItemStore::where('store_id', $store_id)->where('unit_id', $value->unit_id)->update([
                'amount' => $linkItemStore + $damge_amount,
            ]);
        }
        Totaldamge::where('id', $id)->delete();
        Damge::where('total_id', $id)->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }

    public function damgeAjax($id)
    {
        $storeItem = LinlItemStore::where('store_id', $id)->with('items')->get();
        return json_encode($storeItem);
    }

    public function unitsAjax($store_id, $id)
    {
        $storeUnits = LinlItemStore::where('store_id', $store_id)->where('id', $id)->with('units')->get();
        return json_encode($storeUnits);
    }
}
