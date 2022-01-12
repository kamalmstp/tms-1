@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-12 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add Total Cash (This Month)</b></h3>
	            <div class="block-options">
	            	<a href="{{route('adjust-collection.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>Total Cash Calculate List (This Month)
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                	<div class="row">
	            			<div class="col-12 col-md-12 text-center p-2">
	            				<div class="form-group row">
		                            <div class="col-12">
		                            </div>
		                        </div>
	            			</div>
	            		</div>
	            		

	            		
	                    <!-- <div class="row">
	                    	<div class="col-md-12">
	                    		<div class="text-center pb-4">
	                    			<img height="50" src="/asset/backend_asset/assets/media/photos/checked-success-svgrepo-com.svg">
	                    		</div>
	                    		<h4 class="text-success text-center">
	                    			Today Total Cash Information Added Successfully......!
	                    		</h4>
	                    		<h4 class="text-info text-center">
	                    			Please Added Next Day Total Cash Information......!
	                    		</h4>
	                    	</div>
	                    </div> -->
	                    


	                    <form action="{{route('adjust-collection.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="col-md-12">
	                    		<div class="row">
	                    			<div class="col-12 col-md-12 text-center p-2">
	                    				<div class="form-group row">
				                            <div class="col-12">
				                            	
												<label for="example-autocomplete1">Date Selection: </label>
												<input type="date" required name="date" id="date">
				                            </div>
				                        </div>
	                    			</div>
	                    			<!-- <div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Dhaka Shadhak Point Collection Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                            	<input type="number" class="js-autocomplete form-control" disabled="" id="ds_ammount" placeholder="xxxx">
				                            	<input type="hidden" name="ds_ammount" id="ds_ammounts">
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Saydabad Point Collection Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                            	<input type="number" class="js-autocomplete form-control" disabled="" id="saydabad_ammount" placeholder="xxxx">
				                            	<input type="hidden" id="saydabad_ammounts" name="saydabad_ammount">
				                            </div>
				                        </div>
	                    			</div> -->
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">GP Point Collection Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                            	<input type="number" class="js-autocomplete form-control" disabled="" name="gp_ammount" id="gp_ammount" placeholder="xxxx">
				                            	<input type="hidden" id="gp_ammounts" name="gp_ammount">
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Minus (GP Point) Owner Buses Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                            	<input type="number" class="js-autocomplete form-control" name="minus_gp_ammount" min="1" id="minus_gp_ammount" placeholder="xxxx">
				                            	@error('minus_gp_ammount')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">(GP Point) Less Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                            	<input type="number" disabled="" class="js-autocomplete form-control" id="after_minus_gp_ammount" placeholder="xxxx">
				                            	<input type="hidden" name="after_minus_gp_ammount" id="after_minus_gp_ammount_2">
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
	// $(document).ready(function() {
	//     $('#date').on('change', function(){
	//         var date = $(this).val();
	//         // console.log(date);
	//         let url = '/admin/dsammount/'+date;
	//         $.ajax({
	// 	        type: "get",
	// 	        url: url,
	// 	        dataType: "json",
	// 	        success:function(response) {
	// 	        	console.log(response);
	//                 $('#ds_ammount').val(response);
	// 	        	$('#ds_ammounts').val(response);
	//             },
	// 	    });


	//     });
	// });

	// $(document).ready(function() {
	//     $('#date').on('change', function(){
	//         var date = $(this).val();
	//         // console.log(date);
	//         let url = '/admin/saydabadammount/'+date;
	//         $.ajax({
	// 	        type: "get",
	// 	        url: url,
	// 	        dataType: "json",
	// 	        success:function(response) {
	// 	        	console.log(response);
	// 	        	$('#saydabad_ammount').val(response);
	// 	        	$('#saydabad_ammounts').val(response);
	//             },
	// 	    });
	//     });
	// });

	$(document).ready(function() {
	    $('#date').on('change', function(){
	        var date = $(this).val();
	        // console.log(date);
	        let url = '/admin/gpammount/'+date;
	        $.ajax({
		        type: "get",
		        url: url,
		        dataType: "json",
		        success:function(response) {
		        	console.log(response);
		        	$('#gp_ammount').val(response);
		        	$('#gp_ammounts').val(response);
	            },
		    });


	    });
	});
</script>
<script type="text/javascript">
	$(function(){
	    $('#minus_gp_ammount').on('keyup', function() {
	        var minus_gp_ammount = parseInt($('#minus_gp_ammount').val());
	      calculate();
	    });
	    function calculate(){ 
	        var gp_ammount = parseInt($('#gp_ammount').val());
	        var minus_gp_ammount = parseInt($('#minus_gp_ammount').val());
	        var after_minus_ammount = (gp_ammount - minus_gp_ammount);
	        var main = document.getElementById('after_minus_gp_ammount');
	        var main2 = document.getElementById('after_minus_gp_ammount_2');
	                main.value = after_minus_ammount;
	                main2.value = after_minus_ammount;
	        
	    }
	});
</script>
@endsection