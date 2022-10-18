<?php

namespace App\Http\Controllers\Admin;

use App\Models\AddCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddCompanyController extends Controller
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
        return view('admin.pages.addcompany.create' , compact('companies'));
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
        AddCompany::create([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'fax' => $request->fax,
            'en_name' => $request->en_name,
            'phone' => $request->phone,
            'email' => $request->email,
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
        $companies = AddCompany::findOrFail($id);
        return view('admin.pages.addcompany.edit' , compact('companies'));;
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
        $companies = AddCompany::findOrFail($id);
        $companies->update([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'fax' => $request->fax,
            'en_name' => $request->en_name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
        return redirect()->route('companies.create')->with(['success' => " تم  بنجاح"]);
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
        $companies = AddCompany::findOrFail($id);
        $companies->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
