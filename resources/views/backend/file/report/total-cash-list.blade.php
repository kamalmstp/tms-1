@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Total Cash Calculate List</b></h3>
	        <span class="text-center pl-4 pr-4">
	        	@if($month=="01")
	        		January
	        	@elseif($month=="02")
	        		February
	        	@elseif($month=="03")
	        		March
	        	@elseif($month=="04")
	        		April
	        	@elseif($month=="05")
	        		May
	        	@elseif($month=="06")
	        		June
	        	@elseif($month=="07")
	        		July
	        	@elseif($month=="08")
	        		August
	        	@elseif($month=="09")
	        		September
	        	@elseif($month=="10")
	        		October
	        	@elseif($month=="11")
	        		November
	        	@elseif($month=="12")
	        		December
	        	@endif

	        	 - {{$year}}
	    	</span>
	        <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                <i class="si si-printer"></i> Print List
            </button>
	    </div>
	    <div class="block-content block-content-full" id="printableArea">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Date &nbsp;</th>
	                        <th class="text-center">GP Point Total Ammount &nbsp;</th>
	                        <th class="text-center">Owner Bus Ammount &nbsp;</th>
	                        <th class="text-center">GP Point Total Ammount &nbsp;</th>
	                        <th class="text-center">Total Ammount &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; $total = 0; @endphp
                    	@foreach($total_cash as $data)
                    	@php 
                          $total+=$data->after_minus_gp_ammount;
                    	@endphp 
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">
	                			{{$data->date}}
	                		</td>
		                	<td class="text-center">
		                		{{$data->gp_ammount}}
		                	</td>
		                	<td class="text-center">
		                		{{$data->minus_gp_ammount}}
		                	</td>
		                	<td class="text-center">
		                		{{$data->after_minus_gp_ammount}}
		                	</td>
		                	<!-- <td class="text-center">
		                		{{$data->total_ammount}}

		                	</td> -->
		                	<td class="text-center">{{$total}}</td>
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