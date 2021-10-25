<?php

namespace App\Http\Controllers;

use App\Models\Ammount;
use App\Models\CollectionPoint;
use Illuminate\Http\Request;
use App\Http\Requests\AmmountRequest;

class AmmountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ammounts = Ammount::orderBy('id','desc')->paginate();
        return view('backend.file.ammount.list', compact('ammounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $collection = CollectionPoint::where('status',1)->get();
        return view('backend.file.ammount.create',compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmmountRequest $request)
    {
        $ammount = new Ammount();
        $requested_data = $request->all();
        $ammount->status = 1;
        $save = $ammount->fill($requested_data)->save();
        if($save){
            return redirect()->route('ammount.list')->with('message','Ammount Added Successfully');
        }else{
            return back()->with('error','Ammount Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ammount  $ammount
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = Ammount::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','Ammount Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','Ammount Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ammount  $ammount
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $collection = CollectionPoint::where('status',1)->get();
        $ammount = Ammount::where('id',$id)->first();
        return view('backend.file.ammount.edit',compact('ammount','collection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ammount  $ammount
     * @return \Illuminate\Http\Response
     */
    public function update(AmmountRequest $request, $id)
    {
        $update = Ammount::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('ammount.list')->with('message','Ammount Updated Successfully');
        }else{
            return back()->with('error','Ammount Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ammount  $ammount
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Ammount::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
