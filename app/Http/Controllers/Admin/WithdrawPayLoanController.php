<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bank;
use App\Models\Treasury;
use App\Models\BorrowerData;
use Illuminate\Http\Request;
use App\Models\WithdrawPayLoan;
use App\Http\Controllers\Controller;
use App\Models\Account;

class WithdrawPayLoanController extends Controller
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
        $borrowsData = BorrowerData::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $withdrawPayLoans = WithdrawPayLoan::get();
        return view('admin.pages.WithdrawPayLoans.create', compact('withdrawPayLoans', 'borrowsData' , 'treasuries' , 'banks'));
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
        $result = $request->paidFrom - $request->paidTo;
        $treasury = Treasury::where('id',$request->treasury_id)->value('treasury_value');
        $bank = Bank::where('id',$request->bank_id)->value('amount');

        if($request->treasury_id!= "" && $request->bank_id == ""){
            Treasury::where('id',$request->treasury_id)->update([
                'treasury_value'=> $treasury + $result,
            ]);
        }elseif($request->treasury_id == ""  && $request->bank_id != ""){
            Bank::where('id',$request->bank_id)->update([
                'amount'=> $bank + $result,
            ]);
        }elseif($request->treasury_id != "" && $request->bank_id != ""){
            return redirect()->back()->with(['error' => "لا يمكن اختيار البنك والخزينة معا , من فضلك اختر احدهما"]);
        }
        elseif($request->treasury_id == "" && $request->bank_id == ""){
            return redirect()->back()->with(['error' => "لا يمكن اتمام العملية من فضلك اختر بنك او خزينة"]);
        }
        WithdrawPayLoan::create([
            'borrowData_id' =>$request->borrowData_id,
            'date' =>$request->date,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'paidFrom' =>$request->paidFrom,
            'paidTo' =>$request->paidTo,
            'rest' =>$request->rest,
            'notes' =>$request->notes,
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
        $borrowsData = BorrowerData::get();
        $treasuries = Treasury::get();
        $banks = Bank::get();
        $withdrawPayLoans = WithdrawPayLoan::findOrFail($id);
        return view('admin.pages.WithdrawPayLoans.edit', compact('withdrawPayLoans', 'borrowsData' , 'treasuries' , 'banks'));
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

        $withdrawPayLoans = WithdrawPayLoan::findOrFail($id);
        $treasury = Treasury::where('id',$request->treasury_id)->value('treasury_value');
        $bank = Bank::where('id',$request->bank_id)->value('amount');
        $result = ($withdrawPayLoans->paidFrom - $request->paidFrom) - ($withdrawPayLoans->paidTo - $request->paidTo);
        if($request->treasury_id!= "" && $request->bank_id == ""){
            Treasury::where('id',$request->treasury_id)->update([
                'treasury_value'=> $treasury - $result,
            ]);
        }elseif($request->treasury_id == ""  && $request->bank_id != ""){
            Bank::where('id',$request->bank_id)->update([
                'amount'=> $bank - $result,
            ]);
        }elseif($request->treasury_id != "" && $request->bank_id != ""){
            return redirect()->back()->with(['error' => "لا يمكن اختيار البنك والخزينة معا , من فضل اختر احدهما"]);
        }
        elseif($request->treasury_id == "" && $request->bank_id == ""){
            return redirect()->back()->with(['error' => "لا يمكن اتمام العملية من فضلك اختر بنك او خزينة"]);
        }
        $withdrawPayLoans->update([
            'borrowData_id' =>$request->borrowData_id,
            'date' =>$request->date,
            'treasury_id' =>$request->treasury_id,
            'bank_id' =>$request->bank_id,
            'paidFrom' =>$request->paidFrom,
            'paidTo' =>$request->paidTo,
            'rest' =>$request->rest,
            'notes' =>$request->notes,
        ]);
        return redirect()->route('withdrawPayLoan.create')->with(['success' => " تم  بنجاح"]);
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
        $withdrawPayLoans = WithdrawPayLoan::findOrFail($id);
        $withdrawPayLoans->delete();
        return redirect()->back()->with(['success' => "تم الحذف بنجاح"]);
    }
}



// $withdrawPayLoans = WithdrawPayLoan::findOrFail($id);
//         $treasury = Treasury::where('id',$request->treasury_id)->value('treasury_value');
//         $bank = Bank::where('bank_id',$request->bank_id)->value('amount');
//         $withdrawPayLoanFrom = $withdrawPayLoans->paidFrom;
//         $withdrawPayLoanTo = $withdrawPayLoans->paidTo;
//         $result = ($withdrawPayLoanFrom - $request->paidFrom) - ($withdrawPayLoanTo - $request->paidTo);
//         if($request->treasury_id!= "" && $request->bank_id == ""){
//             Treasury::where('id',$request->treasury_id)->update([
//                 'treasury_value'=> $treasury + $result,
//             ]);
//         }elseif($request->treasury_id == ""  && $request->bank_id != ""){
//             Account::where('bank_id',$request->bank_id)->update([
//                 'amount'=> $bank + $result,
//             ]);
//         }elseif($request->treasury_id != "" && $request->bank_id != ""){
//             return redirect()->back()->with(['error' => "لا يمكن اختيار البنك والخزينة معا , من فضل اختر احدهما"]);
//         }
//         elseif($request->treasury_id == "" && $request->bank_id == ""){
//             return redirect()->back()->with(['error' => "لا يمكن اتمام العملية من فضلك اختر بنك او خزينة"]);
//         }
//         $withdrawPayLoans->update([
//             'borrowData_id' =>$request->borrowData_id,
//             'date' =>$request->date,
//             'treasury_id' =>$request->treasury_id,
//             'bank_id' =>$request->bank_id,
//             'paidFrom' =>$request->paidFrom,
//             'paidTo' =>$request->paidTo,
//             'rest' =>$request->rest,
//             'notes' =>$request->notes,
//         ]);
//         return redirect()->route('withdrawPayLoan.create')->with(['success' => " تم  بنجاح"]);
