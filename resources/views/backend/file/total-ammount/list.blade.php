@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Adjust Colection Ammount Table</b></h3>
	        <a href="{{route('adjust-collection.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Adjust Colection Ammount
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Date &nbsp;</th>
	                        <th class="text-center">Sayedabad Point Total Ammount&nbsp;</th>
	                        <th class="text-center">Dhaka Shadhak Point Total Ammount&nbsp;</th>
	                        <th class="text-center">GP Point Total Ammount &nbsp;</th>
	                        <th class="text-center">Owner Bus Ammount &nbsp;</th>
	                        <th class="text-center">GP Point Total Ammount &nbsp;</th>
	                        <th class="text-center">Total Ammount &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($total_cash as $data)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">
	                			{{$data->date}}
	                		</td>
		                	<td class="text-center">
		                		{{$data->saydabad_ammount}}
		                	</td>
		                	<td class="text-center">
		                		{{$data->ds_ammount}}
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
		                	<td class="text-center">
		                		{{$data->total_ammount}}
		                	</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
@endsection