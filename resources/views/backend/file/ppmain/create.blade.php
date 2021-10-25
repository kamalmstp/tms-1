@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-8 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add Police Payment Main Sector</b></h3>
	            <div class="block-options">
	            	<a href="{{route('ppmain.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>Police Payment Main Sector List
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                    <form action="{{route('ppmain.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">Expense Category: <span class="text-danger">*</span></label>
	                            <div class="col-12">
	                                <select class="form-control" id="example-select" name="expense_category_id" required="">
                                        <option selected="" value="{{$ec->id}}">{{$ec->expense_category_name}}</option>
                                    </select>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">Police Payment Main Sector Name: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="text" class="js-autocomplete form-control" name="sector_name" id="example-autocomplete1" placeholder="Police Payment Main Sector Name...">
	                                @error('sector_name')
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