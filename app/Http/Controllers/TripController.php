<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;
use App\Http\Requests\TripRequest;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::orderBy('id','desc')->get();
        return view('backend.file.trip.list', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.trip.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TripRequest $request)
    {
        $trip = new Trip();
        $requested_data = $request->all();
        $trip->status = 1;
        $save = $trip->fill($requested_data)->save();
        if($save){
            return redirect()->route('trip.list')->with('message','Trip Added Successfully');
        }else{
            return back()->with('error','Trip Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Trip::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','Trip Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','Trip Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trip = Trip::where('id',$id)->first();
        return view('backend.file.trip.edit',compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(TripRequest $request, $id)
    {
        $update = Trip::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('trip.list')->with('message','Trip Updated Successfully');
        }else{
            return back()->with('error','Trip Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Trip::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
