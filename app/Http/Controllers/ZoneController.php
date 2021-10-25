<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use App\Http\Requests\ZoneRequest;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = Zone::orderBy('id','desc')->paginate();
        return view('backend.file.zone.list', compact('zones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ZoneRequest $request)
    {
        $type = new Zone();
        $requested_data = $request->all();
        $save = $type->fill($requested_data)->save();
        if($save){
            return redirect()->route('zone.list')->with('message','Zone Added Successfully');
        }else{
            return back()->with('error','Zone Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function show(Zone $zone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::where('id',$id)->first();
        return view('backend.file.zone.edit',compact('zone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function update(ZoneRequest $request,$id)
    {
        $update = Zone::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('zone.list')->with('message','Zone Updated Successfully');
        }else{
            return back()->with('error','Zone Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zone  $zone
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Zone::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
