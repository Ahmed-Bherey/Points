<?php

namespace App\Http\Controllers\Admin;

use App\Models\StStore;
use Illuminate\Http\Request;
use App\Models\CollectQuantity;
use App\Http\Controllers\Controller;

class CollectQuantityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = StStore::get();
        $collectquantities = CollectQuantity::get();
        return view('admin.pages.collectquantity.create' , compact('stores', 'collectquantities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        CollectQuantity::create([
            'name' =>$request->name,
            'max_qty' =>$request->max_qty,
            'quantity' =>$request->quantity,
            'actual_qty' =>$request->actual_qty,
            'storeFrom_id' =>$request->storeFrom_id,
            'storeTo_id' =>$request->storeTo_id,
            'turn_num' =>$request->turn_num,
            'date' =>$request->date,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
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
        $collectquantities = CollectQuantity::findOrFail($id);
        return view('admin.pages.collectquantity.edit' , compact('stores', 'collectquantities'));
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
        $collectquantities = CollectQuantity::findOrFail($id);
        $collectquantities->update([
            'name' =>$request->name,
            'max_qty' =>$request->max_qty,
            'quantity' =>$request->quantity,
            'actual_qty' =>$request->actual_qty,
            'storeFrom_id' =>$request->storeFrom_id,
            'storeTo_id' =>$request->storeTo_id,
            'turn_num' =>$request->turn_num,
            'date' =>$request->date,
        ]);
        return redirect()->route('collectquantity.create')->with(['success' => " تم  بنجاح"]);
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
        $collectquantities = CollectQuantity::findOrFail($id);
        $collectquantities->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
