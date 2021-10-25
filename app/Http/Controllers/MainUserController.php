<?php

namespace App\Http\Controllers;

use App\Models\MainUser;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Http\Requests\MainUserRequest;
use File;
use Str;

class MainUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = MainUser::orderBy('id','desc')->paginate();
        return view('backend.file.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = UserType::where('status',1)->get();
        return view('backend.file.user.create',compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MainUserRequest $request)
    {
        $user = new MainUser();
        $requested_data = $request->all();
        $user->status = 1;
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "asset/backend_asset/assets/images/user/nid/";
            $request->file('image')->move($path, $name);
            $requested_data['image'] = $path . $name;
        }
        $save = $user->fill($requested_data)->save();
        if($save){
            return redirect()->route('user.list')->with('message','User Added Successfully');
        }else{
            return back()->with('error','User Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $status = MainUser::findOrFail($id);
        if ($status->status == 0) {
            $status->status = 1;
            $status->save();
            return redirect()->back()->with('message','User Status Activeted');
        } else {
            $status->status = 0;
            $status->save();
            return redirect()->back()->with('error','User Status Deactiveted');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $types = UserType::where('status',1)->get();
        $user = MainUser::where('id',$id)->first();
        return view('backend.file.user.edit',compact('user','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = MainUser::findOrFail($id);
        $formData = $request->all();
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $name = 'image' . Str::random(5) . '.' . $extension;
            $path = "asset/backend_asset/assets/images/user/nid/";
            $request->file('image')->move($path, $name);
            $formData['image'] = $path . $name;
        }
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('user.list')->with('message','User Updated Successfully');
        }else{
            return back()->with('error','User Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MainUser  $mainUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MainUser::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
