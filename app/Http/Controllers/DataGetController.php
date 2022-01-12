<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ammount;
use App\Models\CollectionPoint;
use App\Models\CashCollection;
use App\Models\PolicePaymentMain;
use App\Models\PolicePaymentSub;
use App\Models\Bus;
use App\Models\Trip;
use DB;
use Arr;

class DataGetController extends Controller
{
    public function ammount($id){
        $ammount = Ammount::where('collection_point_id', $id)->where('status',1)->get();
        return response()->json($ammount, 200);
    }

    public function buses($id, $date){
        $collection_buses = CashCollection::orWhere('trip_id', 4)->orWhere('trip_id', 3)->orWhere('collection_point_id', $id)->where('date',$date)->get()->pluck('bus_id')->toArray();
        $all_buses = Bus::where('status',1)->get()->pluck('id')->toArray();
        // dd($all_buses);
        $result=array_intersect($collection_buses,$all_buses);
        $extraBus = Bus::whereNotIn('id', $result)->where('status', 1)->get();
        return response()->json($extraBus, 200);
    }

    public function tripbuses($id,$date){

        $collection_buses = CashCollection::orWhere('trip_id', 1)->orWhere('trip_id', 2)->orWhere('trip_id', 3)->orWhere('trip_id', 4)->orWhere('collection_point_id', 1)->orWhere('collection_point_id', 2)->orWhere('collection_point_id', 3)->where('date',$date)->get()->pluck('bus_id')->toArray();
        // dd($collection_buses);
        $all_buses = Bus::where('status',1)->get()->pluck('id')->toArray();
        $result=array_intersect($collection_buses,$all_buses);
        $extraBus = Bus::whereNotIn('id', $result)->where('status', 1)->get();
        // dd($extraBus);
        return response()->json($extraBus, 200);
    }



    public function policemain($id){
        $ammount = PolicePaymentMain::where('expense_category_id', $id)->get();
        return response()->json($ammount, 200);
    }

    public function policesub($id){
        $ammount = PolicePaymentSub::where('main_sector_id', $id)->get();
        return response()->json($ammount, 200);
    }
}