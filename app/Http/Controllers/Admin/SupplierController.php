<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSupplierRequest;

class SupplierController extends Controller
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
        $suppliers = Supplier::get();
        return view('admin.pages.suppliers.create' , compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplierRequest $request)
    {
        //
        Supplier::create([
            'name' =>$request->name,
            'code' =>$request->code,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'email' =>$request->email,
            'notes' =>$request->notes,
            'balance'=>0,
            'user_id' =>Auth::user()->id,
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
        $suppliers = Supplier::findOrFail($id);
        return view('admin.pages.suppliers.edit' , compact('suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreSupplierRequest $request, $id)
    {
        //
        $suppliers = Supplier::findOrFail($id);
        $suppliers->update([
            'name' =>$request->name,
            'code' =>$request->code,
            'address' =>$request->address,
            'tel' =>$request->tel,
            'email' =>$request->email,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('supplier.create')->with(['success' => " تم  بنجاح"]);
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
        $suppliers = Supplier::findOrFail($id);
        $suppliers->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
