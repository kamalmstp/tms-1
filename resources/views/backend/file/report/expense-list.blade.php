@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Expense Table</b></h3>
	        <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                <i class="si si-printer"></i> Print List
            </button>
	    </div>
	    <div class="block-content block-content-full" id="printableArea">
	    	<div class="table-responsive">
	    		<span class="mr-4">From: {{$from_date}}</span><span class="ml-4">To: {{$to_date}}</span>
	            <table class="table table-bordered table-striped table-vcenter">
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
		                		{{$expense->expenseCategory? $expense->expenseCategory->expense_category_name : 'Empty'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->zone? $expense->zone->zone_name : 'Empty'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->policeMain? $expense->policeMain->sector_name : 'Empty'}}
		                	</td>
		                	<td class="text-center">
		                		{{$expense->policeSub? $expense->policeSub->sub_sector_name : 'Empty'}}
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

@section('script')
<script type="text/javascript">
	function printDiv(divName) {
	    var printContents = document.getElementById(divName).innerHTML;
	    var originalContents = document.body.innerHTML;
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
	}
</script>
@endsection