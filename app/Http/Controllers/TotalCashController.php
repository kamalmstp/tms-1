<?php

namespace App\Http\Controllers;

use App\Models\TotalCash;
use Illuminate\Http\Request;
use App\Models\CashCollection;
use DB;
use App\Http\Requests\TotalCashRequest;

class TotalCashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $month = date('m');
        $year = date('Y');
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
        return view('backend.file.total-ammount.list',compact('total_cash'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $date = (date('Y-m-d'));
        // $inserted_value = TotalCash::where('date',$date)->first();
        // dd($inserted_value);
        return view('backend.file.total-ammount.create');
    }

    public function dsammount($date){
        $ds_ammount= DB::table('cash_collections')->where('cash_collections.collection_point_id',1)->select('cash_collections.ammount_id')->join("ammounts", "ammounts.id", "=", "cash_collections.ammount_id")->where('cash_collections.date',$date)->sum('ammounts.ammounts');
        return response()->json($ds_ammount, 200);
    }
    public function saydabadammount($date){
        $saydabad_ammount= DB::table('cash_collections')->where('cash_collections.collection_point_id',2)->select('cash_collections.ammount_id')->join("ammounts", "ammounts.id", "=", "cash_collections.ammount_id")->where('cash_collections.date',$date)->sum('ammounts.ammounts');
        return response()->json($saydabad_ammount, 200);
    }
    public function gpammount($date){
        $gp_ammount = DB::table('cash_collections')->where('cash_collections.collection_point_id',3)->select('cash_collections.ammount_id')->join("ammounts", "ammounts.id", "=", "cash_collections.ammount_id")->where('cash_collections.date',$date)->sum('ammounts.ammounts');
        return response()->json($gp_ammount, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TotalCashRequest $request)
    {
        // $latests_data = TotalCash::select('total_ammount')->latest()->first();
        // $latests = $latests_data->total_ammount;
        // dd($latests);
        
        $total_cash = new TotalCash();
        $requested_data = $request->all();
        // $total_cash->total_ammount = ($request->saydabad_ammount + $request->ds_ammount + $request->after_minus_gp_ammount + $latests);

        // $total_cash->total_ammount = ($request->after_minus_gp_ammount + $latests);

        // dd($total_cash->total_ammount);
        $save = $total_cash->fill($requested_data)->save();
        if($save){
            return redirect()->route('adjust-collection.list')->with('message','Total Cash Collection Added Successfully');
        }else{
            return back()->with('error','Total Cash Collection Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TotalCash  $totalCash
     * @return \Illuminate\Http\Response
     */
    public function show(TotalCash $totalCash)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TotalCash  $totalCash
     * @return \Illuminate\Http\Response
     */
    public function edit(TotalCash $totalCash)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TotalCash  $totalCash
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TotalCash $totalCash)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TotalCash  $totalCash
     * @return \Illuminate\Http\Response
     */
    public function destroy(TotalCash $totalCash)
    {
        //
    }
}
