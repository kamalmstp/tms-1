<?php

namespace App\Http\Controllers;

use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expense = ExpenseCategory::get();
        return view('backend.file.expense-category.list', compact('expense'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.file.expense-category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new ExpenseCategory();
        $requested_data = $request->all();
        $save = $expense->fill($requested_data)->save();
        if($save){
            return redirect()->route('expense-category.list')->with('message','Expense Category Added Successfully');
        }else{
            return back()->with('error','Expense Category Added Failed!!');;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpenseCategory $expenseCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = ExpenseCategory::where('id',$id)->first();
        return view('backend.file.expense-category.edit',compact('expense'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = ExpenseCategory::findOrFail($id);
        $formData = $request->all();
        $updated = $update->fill($formData)->save();
        if($updated){
            return redirect()->route('expense-category.list')->with('message','Expense Category Updated Successfully');
        }else{
            return back()->with('error',' Expense Category Updated Failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExpenseCategory  $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = ExpenseCategory::where('id', $id)->firstorfail()->delete();
        return back()->with('message','Data Successfully Deleted');
    }
}
