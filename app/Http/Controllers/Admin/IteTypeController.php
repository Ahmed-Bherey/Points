<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\AddCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IteType;

class IteTypeController extends Controller
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
        return view('admin.pages.addtypes.create' , compact('companies' , 'types'));
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

        Type::create([
            'name' => $request->name,
            'ite_company_id' => $request->ite_company_id,
        ]);
        return redirect()->back()->withInput()->with(['success' => " تم  بنجاح"]);
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
        $types = Type::findOrFail($id);
        return view('admin.pages.addtypes.edit' , compact('companies' , 'types'));
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
        $types = Type::findOrFail($id);
        $types->update([
            'name' => $request->name,
            'ite_company_id' => $request->ite_company_id,
        ]);
        return redirect()->route('types.create')->with(['success' => " تم  بنجاح"]);
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
        $types = Type::findOrFail($id);
        $types->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
