<?php

namespace App\Http\Controllers\Admin;

use App\Models\Total;
use App\Models\Client;
use App\Models\IteItem;
use App\Models\StStore;
use App\Models\AddCompany;
use Illuminate\Http\Request;
use App\Models\CashPermission;
use App\Models\CompanySitting;
use App\Models\EqualizQuantite;
use App\Models\TotalCashPermission;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    // equalizQuantite
    public function equalizQuantiteSelect(Request $request)
    {
        $stores = StStore::get();
        return view('admin.pages.reports.equalizQuantites.equalizQuantiteShow', compact('stores'));
    }

    public function equalizQuantiteReport(Request $request)
    {
        $stores = StStore::get();
        $items = IteItem::get();
        $totals = Total::where('date', '>=', $request->dateFrom)->where('date', '<=', $request->dateTo)->where('store_id', $request->store_id)->get();
        return view('admin.pages.reports.equalizQuantites.equalizQuantite',compact('items', 'stores', 'totals'));
    }

    // cashpremission
    public function cashpremissionReport()
    {
        $stores = StStore::get();
        return view('admin.pages.reports.cashpremission.cashpremission', compact('stores'));
    }

    public function cashpremissionShow(Request $request)
    {
        $stores =  StStore::get();
        $items  =  IteItem::get();
        $CompanySittiengs = CompanySitting::get();
        $from=$request->dateFrom;
        $to=$request->dateTo;
        $totals = TotalCashPermission::where('date', '>=', $request->dateFrom)->where('date', '<=', $request->dateTo)->where('store_id', $request->store_id)->get();
        return view('admin.pages.reports.cashpremission.cashpremissionShow',compact('items','from','to','CompanySittiengs','stores', 'totals'));
    }

    // clients
    public function clientSelect(Request $request)
    {
        $clients = Client::get();
        return view('admin.pages.reports.clients.select', compact('clients'));
    }

    public function clientShow(Request $request)
    {
        $stores = StStore::get();
        $items = IteItem::get();
        $CompanySittiengs = CompanySitting::get();
        $from=$request->dateFrom;
        $to=$request->dateTo;
        $totals = TotalCashPermission::where('date', '>=', $request->dateFrom)->where('date', '<=', $request->dateTo)->where('store_id', $request->store_id)->get();
        return view('admin.pages.reports.cashpremission.cashpremissionShow',compact('items','from','to','CompanySittiengs','stores', 'totals'));
    }
}
