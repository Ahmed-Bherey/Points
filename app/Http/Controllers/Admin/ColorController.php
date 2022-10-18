<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IteColor;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors = IteColor::get();
        return view('admin.pages.addcolors.create', compact('colors'));
    }

    public function edit($id)
    {
        $colors= IteColor::findOrFail($id);
        return view('admin.pages.addcolors.edit', compact('colors'));
    }

    public function create()
    {
        $colors= IteColor::get();
        return view('admin.pages.addcolors.create' , compact('colors'));
    }

    public function store(Request $request)
    {
        IteColor::create([
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, $id)
    {
        //
        $colors = IteColor::findOrFail($id);
        $colors->update([
            'name' => $request->name,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function destroy($id)
    {
        //
        $colors = IteColor::findOrFail($id);
        $colors->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}







