@extends('backend.layouts.app')
@section('content')

<div class="container">
	<!-- Invoice -->
    <div class="block">
        <div class="block-header block-header-default">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <h3 class="block-title"><b>Cash Collection Buses List</b></h3>

                <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                    <i class="si si-printer"></i> Print List
                </button>
        </div>
        <div class="block-content" id="printableArea">
        	<div class="p-4">
        		@foreach($collection_buses as $bus)
        		
            <?php
              $all_buses = json_decode($bus->bus_id);
              $total_bus=count($all_buses);
            ?>

        		<div class="row" id="busesList">
        			<div class="col-md-12 text-center p-4"> <span style="font-weight: 700; background: #ddd; padding: 5px 40px; color: #1d1d1b;">Date : {{$bus->date}}</span></div>
                <div class="col-md-12">
                  <h5 style="text-decoration: underline; font-weight: 700; color: green; margin-bottom: 5px;">Information</h5>
                  <span>Collection Point Name: {{$bus->collectionpoint->collection_point_name}}</span><br>
                  <span>Ammount: {{$bus->ammount->ammounts}}</span><br>
                  <span>Trip Name: {{$bus->trip->trip_name}}</span><br>
                  <span>Total Bus: {{$total_bus}}</span><br><br>
                </div>
                <div class="col-md-12">
                  <h5 style="text-decoration: underline; font-weight: 700; color: green; margin-bottom: 5px;">Bus List</h5>
                  <div class="row">
                      @foreach($all_buses as $row)
                        <?php 
                          $ck_data = DB::table('buses')->where('id',$row)->first();                              
                        ?>
                      <div class="col-md-3 col-4">
                        {{$ck_data->bus_code}}
                      </div>
                      @endforeach
                  </div>
                </div>
        		</div>
        		@endforeach
        	</div>
        </div>
    </div>
    <!-- END Invoice -->
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