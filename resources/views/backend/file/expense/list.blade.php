@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Expense Table</b></h3>
	        <a href="{{route('expense.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Expense
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Date &nbsp;</th>
	                        <th class="text-center">Expense Category &nbsp;</th>
	                        <th class="text-center">Zone &nbsp;</th>
	                        <th class="text-center">PP Main Sector &nbsp;</th>
	                        <th class="text-center">PP Sub Sector &nbsp;</th>
	                        <th class="text-center">Expense Reason &nbsp;</th>
	                        <th class="text-center">Ammounts &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($expenses as $expense)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
		                	<td class="text-center">{{$expense->created_at}}</td>
		                	<td class="text-center">
		                		{{$expense->expenseCategory? $expense->expenseCategory->expense_category_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->zone? $expense->zone->zone_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->policeMain? $expense->policeMain->sector_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->policeSub? $expense->policeSub->sub_sector_name : 'null'}}
		                	</td>
		                	<td class="text-center">{{$expense->expense_resone}}</td>
		                	<td class="text-center">{{$expense->ammounts}}</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
@endsection