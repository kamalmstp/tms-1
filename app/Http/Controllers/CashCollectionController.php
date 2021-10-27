<?php

namespace App\Http\Controllers;

use App\Models\CashCollection;
use App\Models\Trip;
use App\Models\CollectionPoint;
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
        $collections = CashCollection::orderBy('id','desc')->get();
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
        //dd($request->date);
        try {
            DB::beginTransaction();
            $requested_data = $request->all();
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
            return back()->with('error','Cash Collection Added Failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CashCollection  $cashCollection
     * @return \Illuminate\Http\Response
     */
    public function show(CashCollection $cashCollection)
    {
        //
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
