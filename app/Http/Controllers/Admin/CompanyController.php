<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IteCompany;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function index()
    {

        $companys = IteCompany::get();
        return view('admin.pages.addcompany.create', compact('companys'));

    }

    public function edit(IteCompany$company)
    {
        $companys= IteCompany::get();
        return view('admin.pages.addcompany.edit', compact('company','companys'));
    }

    public function create()
    {
        return view('admin.addcompany.create');
    }

    public function store(Request $request)
    {

        $company_arr = [];
        foreach ($request->all() as $key => $value) {
            if ($key == '_token') continue;//skip token
            $company_arr[$key] = $value;
        }


        IteCompany::create($company_arr);
        return redirect()->route('companys.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function update(Request $request, IteCompany $company)
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


        $company->update($update_arr);
        return redirect()->route('companys.all.index')->with(['success' => " تم  بنجاح"]);
    }

    public function delete($id)
    {
        //
        $company = IteCompany::findOrFail($id);
        $company->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}







