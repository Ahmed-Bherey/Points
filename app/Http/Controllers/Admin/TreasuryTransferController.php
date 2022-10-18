<?php

namespace App\Http\Controllers\Admin;

use App\Models\Treasury;
use Illuminate\Http\Request;
use App\Models\TreasuryTransfer;
use App\Http\Controllers\Controller;

class TreasuryTransferController extends Controller
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
        $treasuriesFrom = Treasury::get();
        $treasuriesTo = Treasury::get();
        $treasuriesTransfer = TreasuryTransfer::get();
        return view('admin.pages.treasuryTransfer.create', compact('treasuriesTransfer', 'treasuriesFrom', 'treasuriesTo'));
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

        $from = Treasury::where('id', $request->treasuryFrom_id)
            ->value('treasury_value');
        if ($request->value  <= $from) {
            Treasury::where('id', $request->treasuryFrom_id)->update([
                'treasury_value' => $from - $request->value,
            ]);
            $to = Treasury::where('id', $request->treasuryTo_id)
                ->value('treasury_value');
            Treasury::where('id', $request->treasuryTo_id)->update([
                'treasury_value' => $to + $request->value,
            ]);

            TreasuryTransfer::create([
                'date' => $request->date,
                'treasuryFrom_id' => $request->treasuryFrom_id,
                'treasuryTo_id' => $request->treasuryTo_id,
                'value' => $request->value,
                'notes' => $request->notes,
            ]);
            return redirect()->back()->with(['success' => " تم  بنجاح"]);
        } else {
            return redirect()->back()->with(['error' => " فشل التحويل الكمية لا تسمح"]);
        }
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
        $treasuriesFrom = Treasury::get();
        $treasuriesTo = Treasury::get();
        $treasuriesTransfer = TreasuryTransfer::findOrFail($id);
        return view('admin.pages.treasuryTransfer.edit', compact('treasuriesTransfer', 'treasuriesFrom', 'treasuriesTo'));
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
        $treasuriesTransfer = TreasuryTransfer::findOrFail($id);
        $treasuriesTransfer_balance = TreasuryTransfer::where('treasuryFrom_id',$request->treasuryFrom_id)->value('value');
        $data = $treasuriesTransfer_balance - $request->value;
        $from = Treasury::where('id', $request->treasuryFrom_id)->value('treasury_value');
        $to = Treasury::where('id', $request->treasuryTo_id)->value('treasury_value');
        if ($request->value  <= $from) {
            Treasury::where('id', $request->treasuryFrom_id)->update([
                'treasury_value' => $from + $data,
            ]);
            Treasury::where('id', $request->treasuryTo_id)->update([
                'treasury_value' => $to - $data,
            ]);
            $treasuriesTransfer->update([
                'date' => $request->date,
                'treasuryFrom_id' => $request->treasuryFrom_id,
                'treasuryTo_id' => $request->treasuryTo_id,
                'value' => $request->value,
                'notes' => $request->notes,
            ]);
            return redirect()->route('treasuryTransfer.create')->with(['success' => " تم  بنجاح"]);
        }else{
            return redirect()->back()->with(['error' => " فشل التحويل الكمية اقل من" . $request->value]);
        }
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
        $treasuriesTransfer = TreasuryTransfer::findOrFail($id);
        $treasuriesTransfer->delete();
        return redirect()->back()->with(['error' => "تم الحذف بنجاح"]);
    }
}
