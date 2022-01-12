@extends('backend.layouts.app')
@section('content')
<style type="text/css">
	.side-buttons {
	    position: fixed;
	    right: 2px;
	    top: 50%;
	    transform: translateY(-50%);
	    display: block;
	    background-color: #ddd;
	    text-align: center;
	}
	.count-bus{
		height: auto;
	}
	.count-span {
	    background-color: #1a3a46;
	    padding: 5px;
	}
	.count-span span{
		color: #fff;
    	font-weight: 600;
	}
	.count-strong{
		padding: 3px;
	}
	.count-strong strong{
		font-weight: 800;
	    font-size: 15px;
	    color: #1a195a;
	}
	
</style>
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
				                            	
												<label for="example-autocomplete1">Date Selection: </label>
												<input type="date" required name="date" id="collection_date">

				                            </div>
				                        </div>
	                    			</div>
	                    			<div class="col-12 col-md-4">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Trip Name: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="trip_id" name="trip_id" required="" onclick="getBusTrip()">
				                                	<option value="">Please select</option>
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
	                    			<div class="col-12 col-md-4" id="collection_id">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Collection Point Name: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="collection_point_id" name="collection_point_id" onclick="getBus()">
			                                        <option value="">Please select</option>
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
	                    			<div class="col-12 col-md-4" id="ammount">
	                    				<div class="form-group row">
				                            <label class="col-12" for="example-autocomplete1">Ammount: <span class="text-danger">*</span></label>
				                            <div class="col-12">
				                                <select class="form-control" id="ammount_id" name="ammount_id">
			                                        <option value="">Please select</option>
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

<div class="side-buttons">
	<div class="count-bus">
		<div class="count-span">
			<span>Count Bus</span>
		</div>
		<div class="count-strong">
			<strong id="count_id">0</strong>
		</div>
	</div>
</div>

<!-- <input   type="radio" onchange="checkboxes()">
 -->

@endsection
@section('script')

<script type="text/javascript">
	function getBusTrip() {
		// alert('hi');
		let id = $("#trip_id").val();
		let  date = document.getElementById('collection_date').value
		var x = document.getElementById('buses_id');
		if (id == 3 || id == 4) {
			x.style.display = 'flex';
			document.getElementById('collection_id').style.display = 'none';
			document.getElementById('ammount').style.display = 'none';
			let url = '/admin/trip-bus-list/'+id+'/'+date;
		    $.ajax({
		        type: "get",
		        url: url,
		        dataType: "json",
		        success: function (response) {
		            var html = '';
		            html+='<label class="col-12">Select Bus: <span class="text-danger">*</span></label>'
		            console.log(response)
		            response.forEach(element => {
		                html+=`<div class="col-md-2 col-4 box-size">
	                		<div class="custom-control custom-checkbox custom-control-inline mb-5">
	                            <input class="custom-control-input" type="checkbox" name="bus_id[]" id=`+element.id+` value=`+element.id+`>
	                            <label class="custom-control-label" for=`+element.id+`>`+element.bus_code+`</label>
	                        </div>
	                	</div>`
		            });
		            $("#buses_id").html(html);
		        }
		    });
		}else{
			// document.getElementById("buses_id").style.display = "none";
			x.style.display = 'none';
			document.getElementById('collection_id').style.display = 'flex';
			document.getElementById('ammount').style.display = 'flex';
		}
	}
</script>

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
		let  date = document.getElementById('collection_date').value
	    let id = $("#collection_point_id").val();
	    let url = '/admin/bus-list/'+id+'/'+date;
	    document.getElementById('buses_id').style.display = 'flex';
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            html+='<label class="col-12">Select Bus: <span class="text-danger">*</span></label>'
	            console.log(response)
	            response.forEach(element => {
	                html+=`<div class="col-md-2 col-4 box-size">
                		<div class="custom-control custom-checkbox custom-control-inline mb-5">
                            <input class="custom-control-input" type="checkbox" name="bus_id[]" id=`+element.id+` value=`+element.id+` onclick="checkboxes()">
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

<script type="text/javascript">
	function checkboxes(){
	    var inputElems = document.getElementsByTagName("input"),
	    count = 0;
	    for (var i=0; i<inputElems.length; i++) {
	    if (inputElems[i].type === "checkbox" && inputElems[i].checked === true){
	        count++;
	    }
	    console.log(count);
	    $("#count_id").html(count);
	}}
</script>

@endsection