<?php

namespace App\Http\Controllers;

use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Requests\UserTypeRequest;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = UserType::orderBy('id','desc')->paginate();
        return view('backend.file.user-type.list', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.user-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserTypeRequest $request)
    {
        $type = new UserType();
        $requested_data = $request->all();
        $type->status = 1;
        $save = $type->fill($requested_data)->save();
        if($save){
            return redirect()->route('user-type.list')->with('message','User Type Added Successfully');
        }else{
            return back()->with('error','User Type Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = UserType::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','User Type Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','User Type Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = UserType::where('id',$id)->first();
        return view('backend.file.user-type.edit',compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(UserTypeRequest $request, $id)
    {
        $update = UserType::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('user-type.list')->with('message','User Type Updated Successfully');
        }else{
            return back()->with('error','User Type Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UserType::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
