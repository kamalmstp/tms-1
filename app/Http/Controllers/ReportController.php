<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SingleCashCollection;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Trip;
use App\Models\TotalCash;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function cashCollection()
    {
        $trip = Trip::where('status',1)->get();
        return view('backend.file.report.cash-collection', compact('trip'));
    }

    public function busesList(Request $request){
        if($request){
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $collection_buses = SingleCashCollection::where('trip_id', $request->trip_id)->whereBetween('date', [$from_date, $to_date])->get();
            //dd($collection_buses);
            return view('backend.file.report.cash-collection-bus', compact('collection_buses'));
        }
        else{
            return redirect('/admin/report/cash-collection');
        }  
    }

    public function expense()
    {
        $expense = ExpenseCategory::get();
        return view('backend.file.report.expense', compact('expense'));
    }

    public function expenseList(Request $request)
    {
        $from_date = $request->from_date." 00:00:00";
        $to_date = $request->to_date." 23:59:59";
        
        $expenses = Expense::with('expenseCategory','policeMain','policeSub','zone')->where('expense_category_id', $request->expense_category_id)->whereBetween('created_at', [$from_date, $to_date])->orderBy('id','desc')->get();
        return view('backend.file.report.expense-list', compact('expenses','from_date','to_date'));
    }

    public function totalCachReport()
    {
        return view('backend.file.report.total-cash');
    }

    public function totalCashReportList(Request $request)
    {
        $month = $request->month;
        $year = $request->year;
        $f_date=28;
        $fl_date=29;

        // dd($month);

        if ($month == '01' || $month == '03' || $month == '05' || $month == '07' || $month == '08' || $month == 10 || $month == 12) {
            $date_from = $year.'-'.$month.'-'.'01';
            $data_to = $year.'-'.$month.'-'.'31';
        }else if($month == '04' || $month == '06' || $month == '09' || $month == 11){
            $date_from = $year.'-'.$month.'-'.'01';
            $data_to = $year.'-'.$month.'-'.'30';
        }else if($month == '02' && $f_date){
            $date_from = $year.'-'.$month.'-'.'01';
            $data_to = $year.'-'.$month.'-'.$f_date;
        }else if($month == '02' && $fl_date){
            $date_from = $year.'-'.$month.'-'.'01';
            $data_to = $year.'-'.$month.'-'.$f_date;
        }

        $total_cash = TotalCash::whereBetween('date', [$date_from, $data_to])->get();
        return view('backend.file.report.total-cash-list',compact('total_cash','month','year'));
    }

}
