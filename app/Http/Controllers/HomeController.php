<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bus;
use App\Models\CashCollection;
use App\Models\TotalCash;
use App\Models\Expense;
use Carbon\Carbon;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = (date('Y-m-d'));
        $bus = Bus::count('id');
        $collection_buses = CashCollection::where('date',$date)->get()->pluck('bus_id')->count();
        $total_cash = DB::table('cash_collections')->where('cash_collections.date',$date)->leftJoin("ammounts", "ammounts.id", "=", "cash_collections.ammount_id")->sum('ammounts.ammounts');
        //dd($total_cash);

        $expense = Expense::whereDate('created_at', '=', Carbon::today()->toDateString())->sum('ammounts');
        return view('backend.layouts.dashboard', compact('bus','collection_buses', 'total_cash','expense'));
    }
}
