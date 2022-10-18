<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IteSize;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index()
    {

        $sizes = IteSize::get();
        return view('admin.pages.addsizes.create', compact('sizes'));

    }

    public function edit($id)
    {
        $sizes = IteSize::findOrFail($id);
        return view('admin.pages.addsizes.edit', compact('sizes'));
    }

    public function create()
    {
        $sizes= IteSize::get();
        return view('admin.pages.addsizes.create' , compact('sizes'));
    }

    public function store(Request $request)
    {
        IteSize::create([
            'size' => $request->size,
        ]);
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, $id)
    {

        $sizes = IteSize::findOrFail($id);
        $sizes->update([
            'size' => $request->size,
        ]);
        return redirect()->route('sizes.create')->with(['success' => " تم  بنجاح"]);
    }

    public function destroy($id)
    {
        $sizes = IteSize::findOrFail($id);
        $sizes->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }


}







