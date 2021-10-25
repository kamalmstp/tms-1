<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ammount;
use App\Models\CollectionPoint;
use App\Models\CashCollection;
use App\Models\Bus;
use DB;
use Arr;

class DataGetController extends Controller
{
    public function ammount($id){
        $ammount = Ammount::where('collection_point_id', $id)->where('status',1)->get();
        return response()->json($ammount, 200);
    }
    public function buses($id, $date){

        $collection_buses = CashCollection::where('collection_point_id', $id)->where('date',$date)->get()->pluck('bus_id')->toArray();
        $all_buses = Bus::where('status',1)->get()->pluck('id')->toArray();
        // dd($all_buses);
        $result=array_intersect($collection_buses,$all_buses);
        $extraBus = Bus::whereNotIn('id', $result)->where('status', 1)->get();
        return response()->json($extraBus, 200);
    }
}