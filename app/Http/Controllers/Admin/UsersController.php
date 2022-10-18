<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
    public function index(Request $request)
    {
    }


    public function create()
    {
        $users = User::get();
        return view('admin.pages.users.create' , compact('users'));
    }


    public function store(Request $request)
    {
        if ($request->active == ""){
            User::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 0,
            ]);
        }else{
            User::create([
                'name' => $request->name,
                'address' => $request->address,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => $request->active,
            ]);
        }
        return redirect()->back()->with(['success' => " تم  بنجاح"]);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.pages.users.edit' , compact('users'));
    }

    public function update(Request $request, $id)
    {
        $users = User::findOrFail($id);
        if ($request->active == ""){
            if (empty($request->password)){
                $users->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'password' => $request->oldPassword,
                    'active' => 0,
                ]);
            }else{
                $users->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'active' => 0,
                ]);
            }
        }else{
            if (empty($request->password)){
                $users->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'password' => $request->oldPassword,
                    'active' => $request->active,
                ]);
            }else{
                $users->update([
                    'name' => $request->name,
                    'address' => $request->address,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'active' => $request->active,
                ]);
            }
        }
        return redirect()->route('users.create')->with(['success' => " تم  بنجاح"]);
    }

    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();
        return redirect()->back()->with(['success' => " تم  الحذف بنجاح"]);
    }
}
