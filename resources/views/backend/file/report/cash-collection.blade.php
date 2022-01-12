@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Collection Buses Check</b></h3>
	        <a href="{{route('cash-collection.list')}}" class="btn btn-sm btn-alt-primary mr-2">
	            <i class="fa fa-list mr-5"></i>All Cash Collection List
	        </a>
	        <a href="{{route('cash-collection.without-cash-collection')}}" class="btn btn-sm btn-alt-primary mr-2">
	            <i class="fa fa-minus mr-5"></i>Without Cash Buses
	        </a>
	    </div>
	    <div class="block-content">
            <div class="row items-push">
                <!-- jQuery Auto Complete (Bootstrap forms) -->
                <div class="col-xl-12">
                	<form action="{{route('report.cash-collection-bus')}}" method="get">
                    	<div class="form-group row">
                            <div class="col-lg-3">
                            	<label>From</label>
                                <input type="date" required name="from_date" id="from_date" class="js-autocomplete form-control">
                            </div>
                            <div class="col-lg-3">
                            	<label>To</label>
                                <input type="date" required name="to_date" id="to_date" class="js-autocomplete form-control">
                            </div>
                            <div class="col-lg-3">
                            	<div class="form-group row">
				                    <label class="col-12" for="example-autocomplete1">Trip Name: <span class="text-danger">*</span></label>
		                            <div class="col-12">
		                                <select class="form-control" id="trip_id" name="trip_id" required="">
		                                	<option value="">Please select</option>
		                                	@foreach($trip as $data)
	                                        <option value="{{$data->id}}">{{$data->trip_name}}</option>
	                                        @endforeach
	                                    </select>
			                        </div>
				                </div>
                            </div>
                            <div class="col-lg-3 pt-2">
	                            <button type="submit" class="btn btn-square btn-primary min-width-125 mb-10 mt-20">Find</button>
	                        </div>
                        </div>
                    </form>
                </div>
                <!-- END jQuery Auto Complete (Bootstrap forms) -->
            </div>
        </div>
	</div>
</div>
@endsection

<!-- <div class="container">
    <div class="block">
        <div class="block-header block-header-default">
                <h3 class="block-title"><b>Cash Collection Buses List</b></h3>

                <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                    <i class="si si-printer"></i> Print List
                </button>
        </div>
        <div class="block-content" id="printableArea">
        	<div class="p-4">
        		<div class="row" id="busesList">

        		</div>
        	</div>
        </div>
    </div>
</div> -->



<!-- <script type="text/javascript">
	function getBus(){
	    let from_date = $("#from_date").val();
	    let to_date = $("#to_date").val();
	    console.log(date);
	    let url = '/admin/report/cash-collection-bus-list/'+from_date+'/'+to_date;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+=`<div class="col-md-12 text-center pb-4"><span><b> Date: ` + $("#to_date").val() +`</b></span></div>`;
	            console.log(response)
	            response.forEach(element => {
                	html+=`
		        			<div class="col-md-3 col-4">
		        				<span>`+element.bus_code+`</span>
		        			</div>`
	            });
	            $("#busesList").html(html);
	        }
	    });
	}
</script> -->
<!-- <script type="text/javascript">
	function printDiv(divName) {
	    var printContents = document.getElementById(divName).innerHTML;
	    var originalContents = document.body.innerHTML;
	    document.body.innerHTML = printContents;
	    window.print();
	    document.body.innerHTML = originalContents;
	}
</script> -->