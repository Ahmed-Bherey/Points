<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\IteItem;
use App\Models\IteSize;
use App\Models\IteUnit;
use App\Models\StStore;
use App\Models\IteColor;
use App\Models\AddCompany;
use Illuminate\Http\Request;
use App\Models\EqualizQuantite;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\LinlItemStore;
use App\Models\PurchasingPrice;

class IteItemController extends Controller
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
        $companies = AddCompany::get();
        $types = Type::get();
        $sizes = IteSize::get();
        $colors = IteColor::get();
        $stStores = StStore::get();
        $unites = IteUnit::get();
        $items = IteItem::get();
        $currentTime = Carbon::now();
        return view('admin.pages.iteItems.create', compact('currentTime', 'companies', 'types', 'sizes', 'colors', 'stStores', 'items', 'unites'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(request $request)
    {
        //

        $item =  IteItem::create([
            'name' => $request->name,
            'global_code' => $request->global_code,
            'local_code' => $request->local_code,
            'unit_id' => $request->unit_id,
            'company_id' => $request->company_id,
            'type_id' => $request->type_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'sale_price' => $request->sale_price,
            'max_discount' => $request->max_discount,
            'wholesale_price' => $request->wholesale_price,
            'max_sell' => $request->max_sell,
            'half_wholesale' => $request->half_wholesale,
            'min_qty' => $request->min_qty,
            'pur_price' => $request->pur_price,
            'max_qty' => $request->max_qty,
        ]);

        foreach ($request->data["store_id"] as $key => $value) {
            LinlItemStore::create([
                'store_id' => $value,
                'item_id' => $item->id,
                'unit_id' => $item->unit_id,
                'amount' => $request->data['first_balance'][$key],
            ]);

            PurchasingPrice::create([
                'purchasing_price' => $request->pur_price,
                'sale_price' => $request->sale_price,
                'item_id' => $item->id,
                'store_id' => $value,
                'quantity' => $request->data['first_balance'][$key],
            ]);
        }

        // EqualizQuantite::create([
        //     'store_id' => $request->store_id,
        //     'items_id'=> $item->id,
        //     'quantity' => $request->balance,
        // ]);
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
        $companies = AddCompany::get();
        $types = Type::get();
        $sizes = IteSize::get();
        $colors = IteColor::get();
        $stStores = StStore::get();
        $unites = IteUnit::get();
        $items = IteItem::findOrFail($id);
        return view('admin.pages.iteItems.edit', compact('companies', 'types', 'sizes', 'colors', 'stStores', 'items', 'unites'));
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
        $items = IteItem::findOrFail($id);
        $items->update([
            'name' => $request->name,
            'global_code' => $request->global_code,
            'local_code' => $request->local_code,
            'unit_id' => $request->unit_id,
            'company_id' => $request->company_id,
            'type_id' => $request->type_id,
            'size_id' => $request->size_id,
            'color_id' => $request->color_id,
            'sale_price' => $request->sale_price,
            'max_discount' => $request->max_discount,
            'wholesale_price' => $request->wholesale_price,
            'max_sell' => $request->max_sell,
            'half_wholesale' => $request->half_wholesale,
            'min_qty' => $request->min_qty,
            'pur_price' => $request->pur_price,
            'max_qty' => $request->max_qty,
        ]);
        return redirect()->route('items.create')->with(['success' => " تم  بنجاح"]);
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
        $items = IteItem::findOrFail($id);
        if ($items->items()->exists()) {
            return redirect()->back()->with(['success' => " لايمكن حذف هذا العنصر .ربما تم عليه بعض العمليات"]);
        }
        $items->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
