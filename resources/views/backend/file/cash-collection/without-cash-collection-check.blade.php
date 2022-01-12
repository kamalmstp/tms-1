@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Without Collection Buses Check</b></h3>
	        <a href="{{route('cash-collection.list')}}" class="btn btn-sm btn-alt-primary mr-2">
	            <i class="fa fa-list mr-5"></i>Cash Collection List
	        </a>
	        <a href="{{route('cash-collection.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Cash Collection
	        </a>
	    </div>
	    <div class="block-content">
            <div class="row items-push">
                <!-- jQuery Auto Complete (Bootstrap forms) -->
                <div class="col-xl-12">

                    	<div class="form-group row">
                            <div class="col-lg-6">
                                <input type="date" name="date" id="date" class="js-autocomplete form-control">
                            </div>
                            <div class="col-lg-6">
	                            <button type="submit" onclick="getBus()" class="btn btn-square btn-primary min-width-125 mb-10 mt-20">Find</button>
	                        </div>
                        </div>
                </div>
                <!-- END jQuery Auto Complete (Bootstrap forms) -->
            </div>
        </div>
	</div>
</div>
<div class="container">
	<!-- Invoice -->
    <div class="block">
        <div class="block-header block-header-default">
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <button type="button" class="btn-block-option" onclick="printDiv('printableArea')">
                    <i class="si si-printer"></i> Print List
                </button>
            </div>
        </div>
        <div class="block-content" id="printableArea">
        	<div class="row">
        		<div class="col-md-12 text-center pb-4">
        			<span><b>.......... List of Busses that didn't Cash ..........</b></span>
        		</div>
        	</div>
        	<div class="p-4">
        		<div class="row" id="busesList">

        		</div>
        	</div>
        </div>
    </div>
    <!-- END Invoice -->
</div>
@endsection
@section('script')
<script type="text/javascript">
	function getBus(){
	    let date = $("#date").val();
	    let url = '/admin/report/wthout-collection-bus-list/'+date;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
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
</script>
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