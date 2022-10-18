<?php

namespace App\Http\Controllers\Admin;

use App\Models\IteType;
use App\Models\AddCompany;
use App\Models\IteCompany;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{
    public function index()
    {
        $companys=AddCompany::get();
        $types = IteType::get();
        return view('admin.pages.addtypes.create', compact('types','companys'));

    }

    public function edit(IteType $type)
    {  $companys=AddCompany::get();
        $types= IteType::get();
        return view('admin.pages.addtypes.edit', compact('type','types','companys'));
    }

    public function create()
    {
        $companys=AddCompany::get();
        $types = IteType::get();
        return view('admin.pages.addtypes.create' , compact('types','companys'));
    }

    public function store(Request $request)
    {

        $type_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $type_arr[$key] = $value;
        }


        IteType::create($type_arr);
        return redirect()->route('types.all.index')->withInput()->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, IteType $type)
    {

        $update_arr = [];
        foreach ($request->all() as $key => $value) {
            /**
             * 'title' => 'My Title'
             * $key => $value
             */
            if ($key == '_token') continue;//skip token
            $update_arr[$key] = $value;
        }


        $type->update($update_arr);
        return redirect()->route('types.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete(IteType $type)
    {

        $type->delete();
        return redirect()->route('types.all.index')->with(['error' => " تم  بنجاح"]);
    }


}







