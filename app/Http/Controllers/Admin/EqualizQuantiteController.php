<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Http\Request;
use App\Models\EqualizQuantite;
use App\Http\Controllers\Controller;
use App\Models\AddItem;
use App\Models\LinlItemStore;
use App\Models\Total;

class EqualizQuantiteController extends Controller
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
    public function getResult(Request $request)
    {
        //
        $data = IteItem::select('name', 'id')->where('store_id', $request->id)->take(100)->get();
        // return view('admin.pages.EqualizQuantities.create' , compact('items'));
        return response()->json(array($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stStores = StStore::get();
        $items = IteItem::get();
        $quantites = EqualizQuantite::get();
        $totals = Total::get();
        return view('admin.pages.EqualizQuantities.create', compact('quantites', 'stStores', 'items', 'totals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $test = LinlItemStore::where('store_id',$request->store_id)->value('amount');
        // dd($test);
        // $amount = LinlItemStore::where('store_id',$request->store_id)->value('amount');
        // dd($request->store_id);

        $totals = Total::create([
            'store_id' => $request->store_id,
            'date' => $request->date,
        ]);
        foreach ($request->data["items_id"] as $key => $value)
            EqualizQuantite::create([
                'total_id' => $totals->id,
                'store_id' => $request->store_id,
                'items_id' => $value,
                'quantity' => $request->data["quantity"][$key],
                'price' => $request->data['price'][$key],
                'note' => $request->note,
            ]);
        LinlItemStore::where('store_id', $request->store_id)->where('item_id', $request->data["items_id"][$key])->update([
            'amount' => $request->data["quantity"][$key],
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
        $total = Total::find($id);
        $stStores = StStore::get();
        $items = IteItem::get();
        $quantites = EqualizQuantite::where('total_id', $id)->with('items')->get();
        return view('admin.pages.EqualizQuantities.edit', compact('quantites', 'stStores', 'items', 'total'));
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
        $totals = Total::find($id);
        EqualizQuantite::where('total_id', $id)->delete();
        foreach ($request->data["items_id"] as $key => $value) {
            EqualizQuantite::create([
                'total_id' => $totals->id,
                'store_id' => $request->store_id,
                'items_id' => $value,
                'quantity' => $request->data["quantity"][$key],
                'price' => $request->data['price'][$key],
                'note' => $request->note,
            ]);
            LinlItemStore::where('store_id', $request->store_id)->where('item_id', $request->data["items_id"][$key])->update([
                'amount' => $request->data["quantity"][$key],
            ]);
        }
        return redirect()->route('EqualizQuantite.create')->with(['success' => " تم  بنجاح"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // to Delete All Records (Total::truncate();)
        Total::where('id', $id)->delete();
        EqualizQuantite::where('total_id', $id)->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }

    public function equalizAjax($id)
    {
        $storeItem = LinlItemStore::where('store_id', $id)->with('items')->get();
        return json_encode($storeItem);
    }

    // public function equalizAjax($id){
    //     $storeItem = LinlItemStore::where('store_id',$id)->with('items')->get();
    //     return json_encode($storeItem);
    // }

    // public function quantityAjax($id , $store_id){
    //     $quantityItem = LinlItemStore::where('store_id',$store_id)->where('item_id',$id)->value('amount');
    //     return json_encode($quantityItem);
    // }
}
