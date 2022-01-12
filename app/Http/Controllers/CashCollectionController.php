<?php

namespace App\Http\Controllers;

use App\Models\CashCollection;
use App\Models\Trip;
use App\Models\CollectionPoint;
use App\Models\Bus;
use App\Models\SingleCashCollection;
use Illuminate\Http\Request;
use App\Http\Requests\CashCollectionRequest;
use DB;

class CashCollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = SingleCashCollection::orderBy('date','desc')->get();
        return view('backend.file.cash-collection.list', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trip = Trip::where('status',1)->get();
        $point = CollectionPoint::where('status',1)->get();
        return view('backend.file.cash-collection.create', compact('trip','point'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        try {
            DB::beginTransaction();
            // dd($request->all());
            $requested_data = $request->all();

            $single_collection = new SingleCashCollection();
            $requestData['bus_id'] = json_encode($request->bus_id);
            $single_collection->collection_point_id = $request->collection_point_id;
            $single_collection->ammount_id = $request->ammount_id;
            $single_collection->trip_id = $request->trip_id;
            $single_collection->date = $request->date;
            $single_collection->fill($requestData)->save();

            // dd($request->date);
            foreach ($request->bus_id as $index => $bus) {
                $collection = new CashCollection();
                $collection->bus_id = $requested_data['bus_id'][$index];
                $collection->collection_point_id = $requested_data['collection_point_id'];
                $collection->ammount_id = $requested_data['ammount_id'];
                $collection->trip_id = $requested_data['trip_id'];
                $collection->date = $request->date;
                $collection->save();
            }
            DB::commit();
            return back()->with('message','Cash Collection Added Successfully');
        } catch (\Exception $e) {
            // return $e;
            return back()->with('error','Cash Collection Added Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashCollection  $cashCollection
     * @return \Illuminate\Http\Response
     */
    public function singleData($id)
    {
        $collection = SingleCashCollection::where('id', $id)->first();
        $all_buses = json_decode($collection->bus_id);
        $total_bus=count($all_buses);

        return view('backend.file.cash-collection.single-data', compact('collection','all_buses','total_bus'));
    }


    public function withOutCash(){
        return view('backend.file.cash-collection.without-cash-collection-check');
    }

    public function busesList($date){
        // $date = $request->date;
        $without_collection_buses = CashCollection::where('date',$date)->get()->pluck('bus_id')->toArray();
        $all_buses = Bus::get()->pluck('id')->toArray();
        $result=array_intersect($without_collection_buses,$all_buses);
        $extraBus = Bus::whereNotIn('id', $result)->get();
        // dd($extraBus);
        // return view('backend.file.cash-collection.without-cash-collection-check', compact('extraBus'));
        return response()->json($extraBus, 200);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CashCollection  $cashCollection
     * @return \Illuminate\Http\Response
     */
    public function edit(CashCollection $cashCollection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CashCollection  $cashCollection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CashCollection $cashCollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CashCollection  $cashCollection
     * @return \Illuminate\Http\Response
     */
    public function destroy(CashCollection $cashCollection)
    {
        //
    }
}
