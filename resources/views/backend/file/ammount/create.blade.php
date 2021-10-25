@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-8 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add Ammount</b></h3>
	            <div class="block-options">
	            	<a href="{{route('ammount.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>Ammounts List
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                    <form action="{{route('ammount.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">Collection Point Name: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <select class="form-control" id="example-select" name="collection_point_id" required="">
                                        <option>Please select</option>
                                        @foreach($collection as $data)
                                        <option value="{{$data->id}}">{{$data->collection_point_name}}</option>
                                        @endforeach
                                    </select>
	                            </div>
	                        </div>

	                        <div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">Ammounts: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="number" class="js-autocomplete form-control" name="ammounts" id="example-autocomplete1" placeholder="Ammounts">
	                                @error('ammounts')
			                            <span class="text-danger">{{ $message }}</span>
			                        @enderror
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