<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteItem;
use App\Models\StStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{

    public function index()
    {

        $stores = StStore::get();
        return view('admin.pages.store.create', compact('stores'));

    }

    public function edit($id)
    {
        $store= StStore::findOrFail($id);
        return view('admin.pages.store.edit', compact('store'));
    }

    public function create()
    {
        return view('admin.store.create');
    }

    public function store(Request $request)
    {

        $store_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $store_arr[$key] = $value;
        }


        StStore::create($store_arr);
        return redirect()->route('stores.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, $id)
    {

        $stores= StStore::findOrFail($id);
        $stores->update([
            'name' => $request->name,
            'stMan_name' => $request->stMan_name,
            'phone' => $request->phone,
            'address' => $request->address,
            'notes' => $request->notes,
        ]);

        // $update_arr = [];
        // foreach ($request->all() as $key => $value) {
        //     /**
        //      * 'title' => 'My Title'
        //      * $key => $value
        //      */
        //     if ($key == '_token') continue;//skip token
        //     $update_arr[$key] = $value;
        // }


        // $store->update($update_arr);
        return redirect()->route('stores.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(StStore $store)
    {


    if ($store->addstores()->exists())
    {
        return redirect()->route('stores.all.index')->with(['error' => " لايمكن حذف هذا العنصر .ربما تم عليه بعض العمليات"]);
}
        $store->delete();
        return redirect()->route('stores.all.index')->with(['success' => " تم  بنجاح"]);
    }
}







