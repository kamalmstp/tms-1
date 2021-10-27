<?php

namespace App\Http\Controllers;

use App\Models\PolicePaymentSub;
use App\Models\PolicePaymentMain;
use Illuminate\Http\Request;
use App\Http\Requests\PolicePaymentSubRequest;

class PolicePaymentSubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppsub = PolicePaymentSub::get();
        return view('backend.file.ppsub.list', compact('ppsub'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mainsectors = PolicePaymentMain::get();
        return view('backend.file.ppsub.create',compact('mainsectors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicePaymentSubRequest $request)
    {
        $type = new PolicePaymentSub();
        $requested_data = $request->all();
        $save = $type->fill($requested_data)->save();
        if($save){
            return redirect()->route('ppsub.list')->with('message','Police Payment Sub Sector Added Successfully');
        }else{
            return back()->with('error','Police Payment Sub Sector Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicePaymentSub  $policePaymentSub
     * @return \Illuminate\Http\Response
     */
    public function show(PolicePaymentSub $policePaymentSub)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicePaymentSub  $policePaymentSub
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mainsectors = PolicePaymentMain::get();
        $ppsub = PolicePaymentSub::where('id',$id)->first();
        return view('backend.file.ppsub.edit',compact('ppsub','mainsectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicePaymentSub  $policePaymentSub
     * @return \Illuminate\Http\Response
     */
    public function update(PolicePaymentSubRequest $request, $id)
    {
        $update = PolicePaymentSub::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('ppsub.list')->with('message','Police Payment Sub Sector Updated Successfully');
        }else{
            return back()->with('error','Police Payment Sub Sector Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicePaymentSub  $policePaymentSub
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PolicePaymentSub::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
