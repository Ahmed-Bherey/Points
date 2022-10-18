<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\GeneralAccount;
use App\Http\Controllers\Controller;

class GeneralAccountController extends Controller
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
        $generalAccounts = GeneralAccount::get();
        return view('admin.pages.generalAccounts.create', compact('generalAccounts'));
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
        if ($request->active == "")
        GeneralAccount::create([
            'date' =>$request->date,
            'name' =>$request->name,
            'active' =>0,
        ]);
        else
        GeneralAccount::create([
            'date' =>$request->date,
            'name' =>$request->name,
            'active' =>$request->active,
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
        $generalAccounts = GeneralAccount::findOrFail($id);
        return view('admin.pages.generalAccounts.edit', compact('generalAccounts'));
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
        $generalAccounts = GeneralAccount::findOrFail($id);
        if ($generalAccounts->active == "")
        $generalAccounts->update([
            'date' =>$request->date,
            'name' =>$request->name,
            'active' =>0,
        ]);
        else
        $generalAccounts->update([
            'date' =>$request->date,
            'name' =>$request->name,
            'active' =>$request->active,
        ]);
        return redirect()->route('generalAccount.create')->with(['success' => " تم  بنجاح"]);
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
        $generalAccounts = GeneralAccount::findOrFail($id);
        $generalAccounts->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}
