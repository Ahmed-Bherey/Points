<?php

namespace App\Http\Controllers\Admin;

use App\Models\Covenant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CovenantController extends Controller
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
        $covenants = Covenant::get();
        return view('admin.pages.Covenant.create', compact('covenants'));
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
        Covenant::create([
            'name' =>$request->name,
            'date' =>$request->date,
            'type' =>$request->type,
            'amount' =>$request->amount,
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
        $covenants = Covenant::findOrFail($id);
        return view('admin.pages.Covenant.edit', compact('covenants'));
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
        $covenants = Covenant::findOrFail($id);
        $covenants->update([
            'name' =>$request->name,
            'date' =>$request->date,
            'type' =>$request->type,
            'amount' =>$request->amount,
        ]);
        return redirect()->route('covenant.create')->with(['success' => " تم  بنجاح"]);
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
        $covenants = Covenant::findOrFail($id);
        $covenants->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
