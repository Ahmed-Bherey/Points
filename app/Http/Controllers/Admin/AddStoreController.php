<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\StStore;
use App\Models\AddStore;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddStoreController extends Controller
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
        $users = User::get();
        $stStores = StStore::get();
        $addStores = AddStore::get();
        return view('admin.pages.addstore.create' , compact('stStores' , 'users' , 'addStores'));
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
        AddStore::create([
            'user_id' => $request->user_id,
            'st_store_id' => $request->st_store_id,
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
        $users = User::get();
        $stStores = StStore::get();
        $addStores = AddStore::findOrFail($id);
        return view('admin.pages.addstore.edit' , compact('stStores' , 'users' , 'addStores'));
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
        $addStores = AddStore::findOrFail($id);
        $addStores->update([
            'user_id' => $request->user_id,
            'st_store_id' => $request->st_store_id,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
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
        $addStores = AddStore::findOrFail($id);
        $addStores->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
