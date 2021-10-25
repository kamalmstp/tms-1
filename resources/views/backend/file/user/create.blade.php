@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="col-xl-8 single-filed">
		<div class="block">
	        <div class="block-header block-header-default">
	            <h3 class="block-title"><b>Add User</b></h3>
	            <div class="block-options">
	            	<a href="{{route('user.list')}}" class="btn btn-sm btn-alt-primary">
			            <i class="fa fa-list mr-5"></i>User List
			        </a>
	            </div>
	        </div>
	        <div class="block-content">
	            <div class="row items-push">
	                <!-- jQuery Auto Complete (Bootstrap forms) -->
	                <div class="col-xl-12">
	                    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
	                    	@csrf
	                    	<div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">User Type: <span class="text-danger">*</span></label>
	                            <div class="col-12">
	                                <select class="form-control" id="example-select" name="user_type_id" required="">
	                                	<option>Please select</option>
	                                	@foreach($types as $data)
                                        <option value="{{$data->id}}">{{$data->user_type}}</option>
                                        @endforeach
                                    </select>
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">User Name: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="text" class="js-autocomplete form-control" name="user_name" id="example-autocomplete1" placeholder="User Name..">
	                                @error('user_name')
			                            <span class="text-danger">{{ $message }}</span>
			                        @enderror
	                            </div>
	                        </div>
	                        <div class="form-group row">
	                            <label class="col-12" for="example-autocomplete1">User Phone Number: <span class="text-danger">*</span></label>
	                            <div class="col-lg-12">
	                                <input type="text" class="js-autocomplete form-control" name="phone" id="example-autocomplete1" placeholder="01xxxxxxxxx">
	                                @error('phone')
			                            <span class="text-danger">{{ $message }}</span>
			                        @enderror
	                            </div>
	                        </div>

	                        <label>User NID: <span class="text-danger">*</span></label>
	                        <input type='file' name="image" required="" onchange="readURL(this);" /><br><br>
	                        <img id="image" src="{{asset('asset/backend_asset/assets/media/various/image-svgrepo-com.svg')}}" height="200" width="250" alt="your image" /><br>

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
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	            $('#image')
	                .attr('src', e.target.result);
	        };
	        reader.readAsDataURL(input.files[0]);
	    }
}
</script>
@endsection