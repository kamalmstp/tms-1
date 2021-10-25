@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-12 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add Cash Collection</b></h3>
	            <div class="block-options">
	            	<a href="{{route('cash-collection.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>Cash Collection List
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                    <form action="{{route('cash-collection.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="col-md-12">
	                    		<div class="row">
	                    			<div class="col-12 col-md-12 text-center p-2">
	                    				<div class="form-group row">
				                            <div class="col-12">
				                            	<?php
				                            		$showdate = (date('d-m-Y'));
													$date = (date('Y-m-d'));
													?>
													<label for="example-autocomplete1">Today Date: </label>
													<b>{{$showdate}}</b>
													<input type="hidden" id="date" name="date" value="{{$date}}">
													<?php
												?>
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Trip Name: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="example-select" name="trip_id" required="">
				                                	<option>Please select</option>
				                                	@foreach($trip as $data)
			                                        <option value="{{$data->id}}">{{$data->trip_name}}</option>
			                                        @endforeach
			                                    </select>
			                                    @error('trip_id')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Collection Point Name: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="collection_point_id" name="collection_point_id" required="" onclick="getBus()">
			                                        <option>Please select</option>
			                                        @foreach($point as $data)
			                                        <option value="{{$data->id}}">{{$data->collection_point_name}}</option>
			                                        @endforeach
			                                    </select>
			                                    @error('collection_point_id')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="ammount_id" name="ammount_id" required="">
			                                        <option>Please select</option>
			                                    </select>
			                                    @error('ammount_id')
						                            <span class="text-danger">{{ $message }}</span>
						                        @enderror
				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-md-12">
	                    				<div class="form-group row">
                                            <!-- <label class="col-12">Select Bus: <span class="text-danger">*</span></label> -->
                                            <div class="col-md-12">
                                                <div class="row" id="buses_id">
                                                	
                                                </div>
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
	function getAmmount(){
	    let id = $("#collection_point_id").val();
	    // alert(id);
	    let url = '/admin/all-ammount/'+id;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            // console.log(response)
	            response.forEach(element => {
	                html+='<option value='+element.id+'>'+element.ammounts+'</option>'
	            });
	            $("#ammount_id").html(html);
	        }
	    });
	}
</script>

<script type="text/javascript">
	function getBus(){
		let  date = document.getElementById('date').value
	    let id = $("#collection_point_id").val();
	    let url = '/admin/bus-list/'+id+'/'+date;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+='<label class="col-12">Select Bus: <span class="text-danger">*</span></label>'
	            console.log(response)
	            response.forEach(element => {
	                html+=`<div class="col-md-2 col-4">
                		<div class="custom-control custom-checkbox custom-control-inline mb-5">
                            <input class="custom-control-input" type="checkbox" name="bus_id[]" id=`+element.id+` value=`+element.id+`>
                            <label class="custom-control-label" for=`+element.id+`>`+element.bus_code+`</label>
                        </div>
                	</div>`
	            });
	            $("#buses_id").html(html);
	        }
	    });
	    getAmmount();
	}
</script>

@endsection