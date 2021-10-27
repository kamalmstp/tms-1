<?php

namespace App\Http\Controllers;

use App\Models\CollectionPoint;
use Illuminate\Http\Request;
use App\Http\Requests\CollectionPointRequest;

class CollectionPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = CollectionPoint::orderBy('id','desc')->get();
        return view('backend.file.collection-point.list', compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.collection-point.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionPointRequest $request)
    {
        $point = new CollectionPoint();
        $requested_data = $request->all();
        $point->status = 1;
        $save = $point->fill($requested_data)->save();
        if($save){
            return redirect()->route('collection-point.list')->with('message','Collection Point Added Successfully');
        }else{
            return back()->with('error','Collection Point Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = CollectionPoint::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','Collection Point Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','Collection Point Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $point = CollectionPoint::where('id',$id)->first();
        return view('backend.file.collection-point.edit',compact('point'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionPointRequest $request, $id)
    {
        $update = CollectionPoint::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('collection-point.list')->with('message','Collection Point Updated Successfully');
        }else{
            return back()->with('error','CollectionPoint Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CollectionPoint  $collectionPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = CollectionPoint::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
