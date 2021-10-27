<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use App\Http\Requests\BusRequest;

class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buses = Bus::orderBy('id','desc')->get();
        return view('backend.file.bus.list', compact('buses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.bus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BusRequest $request)
    {
        $bus = new Bus();
        $requested_data = $request->all();
        $bus->status = 1;
        $save = $bus->fill($requested_data)->save();
        if($save){
            return redirect()->route('bus.list')->with('message','Bus Added Successfully');
        }else{
            return back()->with('error','Bus Added Failed!!');;
        }
    }

    /**bus
     * Display the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Bus::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','Bus Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','Bus Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bus = Bus::where('id',$id)->first();
        return view('backend.file.bus.edit',compact('bus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function update(BusRequest $request, $id)
    {
        $update = Bus::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('bus.list')->with('message','Bus Updated Successfully');
        }else{
            return back()->with('error','Bus Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bus  $bus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Bus::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
