<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Models\Representative;
use App\Http\Controllers\Controller;

class ClientController extends Controller
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
        $clients = Client::get();
        $representatives = Representative::get();
        return view('admin.pages.clients.create', compact('clients' , 'representatives'));
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
        $ClientLogo = $request->file('logo');
        if ($ClientLogo == null){
            Client::create([
                'name' =>$request->name,
                'tel' =>$request->tel,
                'company_name' =>$request->company_name,
                'phone' =>$request->phone,
                'fax' =>$request->fax,
                'email' =>$request->email,
                'id_num' =>$request->id_num,
                'governorate' =>$request->governorate,
                'city' =>$request->city,
                'town' =>$request->town,
                'note' =>$request->note,
                'address' =>$request->address,
                'representative_id' =>$request->representative_id,
                'credit' =>$request->credit,
                'day' =>$request->day,
                'tax_file' =>$request->tax_file,
                'tax_num' =>$request->tax_num,
                'commerc_num' =>$request->commerc_num,
                'dept' =>$request->dept,
                'balance' =>0,
            ]);
        }else{
        $ClientPostLogo = time().'_'.$ClientLogo->getClientOriginalName();
        $ClientLogo->move('public/img/client' , $ClientPostLogo);
        Client::create([
            'name' =>$request->name,
            'tel' =>$request->tel,
            'company_name' =>$request->company_name,
            'phone' =>$request->phone,
            'fax' =>$request->fax,
            'email' =>$request->email,
            'id_num' =>$request->id_num,
            'governorate' =>$request->governorate,
            'city' =>$request->city,
            'town' =>$request->town,
            'note' =>$request->note,
            'address' =>$request->address,
            'representative_id' =>$request->representative_id,
            'credit' =>$request->credit,
            'day' =>$request->day,
            'tax_file' =>$request->tax_file,
            'tax_num' =>$request->tax_num,
            'commerc_num' =>$request->commerc_num,
            'dept' =>$request->dept,
            'logo' =>$ClientPostLogo,
            'balance' =>0,
        ]);
        }
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
        $clients = Client::findOrFail($id);
        $representatives = Representative::get();
        return view('admin.pages.clients.edit', compact('clients' , 'representatives'));
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
        $clients = Client::findOrFail($id);
        $ClientLogo = $request->file('logo');
        if ($ClientLogo == null) {
            $clients->update([
                'name' => $request->name,
                'tel' => $request->tel,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'id_num' => $request->id_num,
                'governorate' => $request->governorate,
                'city' => $request->city,
                'town' => $request->town,
                'note' => $request->note,
                'address' => $request->address,
                'representative_id' => $request->representative_id,
                'credit' => $request->credit,
                'day' => $request->day,
                'tax_file' => $request->tax_file,
                'tax_num' => $request->tax_num,
                'commerc_num' => $request->commerc_num,
                'dept' => $request->dept,
                'balance' =>0,
            ]);
        } else {
            $ClientPostLogo = time().'_'.$ClientLogo->getClientOriginalName();
            $ClientLogo->move('public/img/client' , $ClientPostLogo);
            $clients->update([
                'name' => $request->name,
                'tel' => $request->tel,
                'company_name' => $request->company_name,
                'phone' => $request->phone,
                'fax' => $request->fax,
                'email' => $request->email,
                'id_num' => $request->id_num,
                'governorate' => $request->governorate,
                'city' => $request->city,
                'town' => $request->town,
                'note' => $request->note,
                'address' => $request->address,
                'representative_id' => $request->representative_id,
                'credit' => $request->credit,
                'day' => $request->day,
                'tax_file' => $request->tax_file,
                'tax_num' => $request->tax_num,
                'commerc_num' => $request->commerc_num,
                'dept' => $request->dept,
                'logo' => $ClientPostLogo,
                'balance' =>0,
        ]);
        }
        return redirect()->route('client.create')->with(['success' => " تم  بنجاح"]);
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
        $clients = Client::findOrFail($id);
        $clients->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
