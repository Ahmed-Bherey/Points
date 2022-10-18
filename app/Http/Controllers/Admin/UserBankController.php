<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\UserBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserBankController extends Controller
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
        $banks = Bank::get();
        $userBanks = UserBank::get();
        return view('admin.pages.userBank.create', compact('userBanks' , 'banks'));
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
        UserBank::create([
            'name' =>$request->name,
            'bank_id' =>$request->bank_id,
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
        $banks = Bank::get();
        $userBanks = UserBank::findOrFail($id);
        return view('admin.pages.userBank.edit', compact('userBanks' , 'banks'));
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
        $userBanks = UserBank::findOrFail($id);
        $userBanks->update([
            'name' =>$request->name,
            'bank_id' =>$request->bank_id,
        ]);
        return redirect()->route('userBank.create')->with(['success' => " تم  بنجاح"]);
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
        $userBanks = UserBank::findOrFail($id);
        $userBanks->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
