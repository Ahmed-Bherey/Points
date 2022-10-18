<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IteUnit;
use Illuminate\Http\Request;

class UnitController extends Controller
{

    public function edit($id)
    {
        $unites= IteUnit::findOrFail($id);
        return view('admin.pages.addunits.edit', compact('unites'));
    }

    public function create()
    {
        $unites = IteUnit::get();
        return view('admin.pages.addunits.create' , compact('unites'));
    }

    public function store(Request $request)
    {
        IteUnit::create([
            'name' =>$request->name,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, $id)
    {
        //
        $unites = IteUnit::findOrFail($id);
        $unites->update([
            'name' =>$request->name,
        ]);
        return redirect()->route('unites.create')->with(['success' => " تم  بنجاح"]);
    }

    public function destroy($id)
    {
        $unit = IteUnit::findOrFail($id);
        $unit->delete();
        return redirect()->back()->with(['error' => " تم  بنجاح"]);
    }
}







