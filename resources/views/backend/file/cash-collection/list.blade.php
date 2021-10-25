@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Cash Collection Table</b></h3>
	        <a href="{{route('cash-collection.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Cash Collection
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Date &nbsp;</th>
	                        <th class="text-center">Collection Point Name &nbsp;</th>
	                        <th class="text-center">Trip &nbsp;</th>
	                        <th class="text-center">Bus Code &nbsp;</th>
	                        <th class="text-center">Date &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($collections as $collection)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">
	                			{{$collection->date}}
	                		</td>
		                	<td class="text-center">
		                		{{$collection->collectionpoint? $collection->collectionpoint->collection_point_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$collection->trip? $collection->trip->trip_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$collection->bus? $collection->bus->bus_code : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$collection->ammount? $collection->ammount->ammounts : 'null'}}
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