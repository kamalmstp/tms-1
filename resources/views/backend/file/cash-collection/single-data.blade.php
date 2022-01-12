@extends('backend.layouts.app')
@section('content')
<!-- Page Content -->
<div class="content">
    <!-- Invoice -->
    <div class="block">
        <div class="block-header block-header-default">
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                    <i class="si si-printer"></i> Print Information
                </button>
            </div>
        </div>
        <div class="block-content">
            <!-- Invoice Info -->
            <div class="row my-20">
                <div class="col-6 text-left">
                    <p class="h3">Cash Collection Information</p>
                    <h5>Date: {{$collection->date}}</h5>
                    <h5>Trip: {{$collection->trip? $collection->trip->trip_name : 'null'}}</h5>
                    <h5>Collection Point: {{$collection->collectionpoint? $collection->collectionpoint->collection_point_name : 'null'}}</h5>
                    <h5>Ammount: {{$collection->ammount? $collection->ammount->ammounts : 'null'}}</h5>
                    <h5>Total Buses: {{$total_bus}}</h5>
                </div>
                <div class="col-6">
                    <p class="h3">Listed Buses</p>
                    <ul>
                    	@foreach($all_buses as $bus)
                    	<li>
                    		<?php 
                                $ck_data = DB::table('buses')->where('id',$bus)->first();                              
                    		?>
                    		{{$ck_data->bus_code}}
                    	</li>
                    	@endforeach
                    </ul>
                </div>
            </div>
            <!-- END Invoice Info -->
        </div>
    </div>
    <!-- END Invoice -->
</div>
<!-- END Page Content -->
@endsection