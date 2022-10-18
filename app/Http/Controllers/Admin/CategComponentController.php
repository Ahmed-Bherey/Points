<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteUnit;
use Illuminate\Http\Request;
use App\Models\CategComponent;
use App\Http\Controllers\Controller;
use App\Models\IteItem;

class CategComponentController extends Controller
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
        $items = IteItem::get();
        $unites = IteUnit::get();
        $catrgComponents = CategComponent::get();
        return view('admin.pages.categcomponents.create' , compact('items' ,'unites', 'catrgComponents'));
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
        CategComponent::create([
            'item_id' =>$request->item_id,
            'pay_cost' =>$request->pay_cost,
            'unit_id' =>$request->unit_id,
            'quantity' =>$request->quantity,
            'combaibed_product_cost' =>$request->combaibed_product_cost,
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
        $items = IteItem::get();
        $unites = IteUnit::get();
        $catrgComponents = CategComponent::findOrFail($id);
        return view('admin.pages.categcomponents.edit' , compact('items' ,'unites', 'catrgComponents'));
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
        $catrgComponents = CategComponent::findOrFail($id);
        $catrgComponents->update([
            'item_id' =>$request->item_id,
            'pay_cost' =>$request->pay_cost,
            'unit_id' =>$request->unit_id,
            'quantity' =>$request->quantity,
            'combaibed_product_cost' =>$request->combaibed_product_cost,
        ]);
        return redirect()->route('categcomponent.create')->with(['success' => " تم  بنجاح"]);
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
        $catrgComponents = CategComponent::findOrFail($id);
        $catrgComponents->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
