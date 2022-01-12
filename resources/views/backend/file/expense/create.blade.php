@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-12 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add Expense</b></h3>
	            <div class="block-options">
	            	<a href="{{route('expense.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>Expense List
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                    <form action="{{route('expense.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="col-md-12">
	                    		<div class="row">

	                    			<div class="col-md-4 col-12">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Expense Category: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" required="" id="expense_cat_id" name="expense_category_id" onchange="getPolicePaymentMain()">
                                                    <option value="">Please select</option>
                                                    @foreach($ex_category as $data)
                                                    <option value="{{$data->id}}">{{$data->expense_category_name}}</option>
                                                    @endforeach
                                                </select>
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-4 col-12" id="zone">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Zone:</label>
				                            <div class="col-12">
				                                <select class="form-control" name="zone_id">
                                                    <option value="">Please select</option>
                                                    @foreach($zone as $data)
                                                    <option value="{{$data->id}}">{{$data->zone_name}}</option>
                                                    @endforeach
                                                </select>
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-4 col-12" id="police_main_sector">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Police Payment Main Sector: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="police_payment_main_id" name="main_sector_id" onchange="getPolicePaymentSub()">
                                                    <option value="">Please select</option>
                                                </select>
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-4 col-12" id="police_sub_sector">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Police Payment Sub Sector: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="sub_sector_id" name="sub_sector_id">
                                                    <option value="">Please select</option>
                                                </select>
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-4 col-12">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Expense Reason: <span class="text-danger">*</span></label>
				                            <div class="col-lg-12">
				                                <input type="text" class="js-autocomplete form-control" name="expense_resone" id="example-autocomplete1" placeholder="Expense Reason...">
				                                @error('expense_resone')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-4 col-12">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Expense Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-lg-12">
				                                <input type="number" class="js-autocomplete form-control" name="ammounts" id="example-autocomplete1" min="1" placeholder="Expense Ammount...">
				                                @error('ammounts')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    		</div>
	                    	</div>
	                        <div class="form-group text-right">
	                            <button type="submit" class="btn btn-square btn-primary min-width-125 mb-10 mt-20">Submit</button>
	                        </div>
	                    </form>
	                </div>
	                <!-- END jQuery Auto Complete (Bootstrap forms) -->
	            </div>
	        </div>
	    </div>
	</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	function getPolicePaymentMain(){
		// alert('hi');
	    let id = $("#expense_cat_id").val();
	    let url = '/admin/police-payment/'+id;
	    if (id >= 2){
	    	$("#zone").hide();
	    	$("#police_main_sector").hide();
	    	$("#police_sub_sector").hide();
	    }else{
	    	$("#zone").show();
	    	$("#police_main_sector").show();
	    	$("#police_sub_sector").show();

	 		$.ajax({
		        type: "get",
		        url: url,
		        dataType: "json",
		        success: function (response) {
		            let html = '';
		            html+='<option>'+'Please select'+'</option>'
		            // console.log(response)
		            response.forEach(element => {
		                html+='<option value='+element.id+'>'+element.sector_name+'</option>'
		            });
		            $("#police_payment_main_id").html(html);
		        }
		    });
	    }   	
	}
</script>

<script type="text/javascript">
	function getPolicePaymentSub(){
	    let id = $("#police_payment_main_id").val();
	    let url = '/admin/police-payment-sub/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            // console.log(response)
	            response.forEach(element => {
	                html+='<option value='+element.id+'>'+element.sub_sector_name+'</option>'
	            });
	            $("#sub_sector_id").html(html);
	        }
	    });
	}
</script>
@endsection