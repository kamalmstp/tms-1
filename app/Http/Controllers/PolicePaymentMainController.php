<?php

namespace App\Http\Controllers;

use App\Models\PolicePaymentMain;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;
use App\Http\Requests\PolicePaymentMainRequest;

class PolicePaymentMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ppmain = PolicePaymentMain::paginate();
        return view('backend.file.ppmain.list', compact('ppmain'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ec = ExpenseCategory::first();
        return view('backend.file.ppmain.create',compact('ec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PolicePaymentMainRequest $request)
    {
        $type = new PolicePaymentMain();
        $requested_data = $request->all();
        $save = $type->fill($requested_data)->save();
        if($save){
            return redirect()->route('ppmain.list')->with('message','Police Payment Main Sector Added Successfully');
        }else{
            return back()->with('error','Police Payment Main Sector Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PolicePaymentMain  $policePaymentMain
     * @return \Illuminate\Http\Response
     */
    public function show(PolicePaymentMain $policePaymentMain)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PolicePaymentMain  $policePaymentMain
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main = PolicePaymentMain::where('id',$id)->first();
        return view('backend.file.ppmain.edit',compact('main'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PolicePaymentMain  $policePaymentMain
     * @return \Illuminate\Http\Response
     */
    public function update(PolicePaymentMainRequest $request, $id)
    {
        $update = PolicePaymentMain::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('ppmain.list')->with('message','Police Payment Main Sector Updated Successfully');
        }else{
            return back()->with('error','Police Payment Main Sector Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PolicePaymentMain  $policePaymentMain
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = PolicePaymentMain::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
