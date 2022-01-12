@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Cash Collection Table</b></h3>
	        <a href="{{route('cash-collection.without-cash-collection')}}" class="btn btn-sm btn-alt-primary mr-2">
	            <i class="fa fa-minus mr-5"></i>Without Cash Buses
	        </a>
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
	                        <th class="text-center">Trip &nbsp;</th>
	                        <th class="text-center">Collection Point Name &nbsp;</th>
	                        <th class="text-center">Taka &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
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
		                		{{$collection->trip? $collection->trip->trip_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$collection->collectionpoint? $collection->collectionpoint->collection_point_name : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		{{$collection->ammount? $collection->ammount->ammounts : 'null'}}
		                	</td>
		                	<td class="text-center">
		                		<!-- <button type="button" class="btn btn-alt-info" data-toggle="modal" data-target="#modal-large">View Listed Buses</button> -->

		                		<a href="{{route('cash-collection.info',$collection->id)}}" class="btn btn-alt-info">View Listed Buses</a>
		                	</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
<!-- Modal -->
<!-- <div class="modal" id="modal-large" tabindex="-1" role="dialog" aria-labelledby="modal-large" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="block block-themed block-transparent mb-0">
                <div class="block-header bg-primary-dark">
                    <h3 class="block-title">Listed Buses Information</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                            <i class="si si-close"></i>
                        </button>
                    </div>
                </div>
                <div class="block-content">
                    <ul>
                    	<li>{{$collection->collectionpoint? $collection->collectionpoint->collection_point_name : 'null'}}</li>
                    </ul>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<!-- END Modal -->

@endsection