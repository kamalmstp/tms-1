@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Total Cash Report</b></h3>
	    </div>
	    <div class="block-content">
            <div class="row items-push">
                <!-- jQuery Auto Complete (Bootstrap forms) -->
                <div class="col-xl-12">
                	<form action="{{route('report.total-cash-list')}}" method="get">
	                	<div class="form-group row">
	                        <div class="col-lg-3">
	                        	<div class="form-group row">
				                    <label class="col-12" for="example-autocomplete1">Month: <span class="text-danger">*</span></label>
		                            <div class="col-12">
		                                <select class="form-control" name="month" required="">
		                                	<option value="">Please Select Month</option>
		                                	<option value="01">January</option>
		                                	<option value="02">February</option>
		                                	<option value="03">March</option>
		                                	<option value="04">April</option>
		                                	<option value="05">May</option>
		                                	<option value="06">June</option>
		                                	<option value="07">July</option>
		                                	<option value="08">August</option>
		                                	<option value="09">September</option>
		                                	<option value="10">October</option>
		                                	<option value="11">November</option>
		                                	<option value="12">December</option>
	                                    </select>
			                        </div>
				                </div>
	                        </div>
	                        <div class="col-lg-3">
	                        	<label>Year: <span class="text-danger">*</span></label>
	                            <input type="text" required name="year" placeholder="ex: 2000" class="js-autocomplete form-control">
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