<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanySitting;
use Illuminate\Http\Request;

class CompanySittingController extends Controller
{

    public function index()
    {

        $companySittings = CompanySitting::first();
        return view('admin.pages.detail.create', compact('companySittings'));

    }

    public function edit(CompanySitting $companySitting)
    {
        return view('admin.pages.detail.edit', compact('companySitting'));
    }

    public function create()
    {
        $companySittings = CompanySitting::get();
        return view('admin.pages.detail.create', compact('companySittings'));
    }

    public function store(Request $request)
    {

        // $store_arr = [];
        // foreach ($request->all() as $key => $value) {
        //     if ($key == '_token') continue;//skip token
        //     $store_arr[$key] = $value;
        // }

        if (isset($request->logo)) {
            CompanySitting::updateOrCreate([],[
                'name' =>$request->name,
                'nameEn' =>$request->nameEn,
                'address' =>$request->address,
                'phone' =>$request->phone,
                'fax' =>$request->fax,
                'web' =>$request->web,
                'mail' =>$request->mail,
                'logo'=>$request->logo->store('public/companys/photo'),
            ]);
        } else {
            CompanySitting::updateOrCreate([],[
                'name' =>$request->name,
                'nameEn' =>$request->nameEn,
                'address' =>$request->address,
                'phone' =>$request->phone,
                'fax' =>$request->fax,
                'web' =>$request->web,
                'mail' =>$request->mail,
            ]);
        }
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, CompanySitting $companySitting)
    {

        // $update_arr = [];
        // foreach ($request->all() as $key => $value) {
        //     /**
        //      * 'title' => 'My Title'
        //      * $key => $value
        //      */
        //     if ($key == '_token') continue;//skip token
        //     $update_arr[$key] = $value;
        // }
        // if ($request->hasFile('logo')) {
        //     $update_arr['logo'] = $request->logo->store('public/companySittings/logo');
        // }

        // $companySitting->update($update_arr);
        // return redirect()->route('companySittings.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete($id)
    {
        // $companySittings = CompanySitting::findOrFail($id);
        // $companySittings->delete();
        // return redirect()->route('companySittings.all.index')->with(['error' => " تم  بنجاح"]);
    }


}







