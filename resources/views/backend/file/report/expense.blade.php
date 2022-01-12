@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Expense Report</b></h3>
	    </div>
	    <div class="block-content">
            <div class="row items-push">
                <!-- jQuery Auto Complete (Bootstrap forms) -->
                <div class="col-xl-12">
                	<form action="{{route('report.expense-list')}}" method="get">
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
				                    <label class="col-12" for="example-autocomplete1">Expense Category Name: <span class="text-danger">*</span></label>
		                            <div class="col-12">
		                                <select class="form-control" name="expense_category_id" required="">
		                                	<option value="">Please select</option>
		                                	@foreach($expense as $data)
	                                        <option value="{{$data->id}}">{{$data->expense_category_name}}</option>
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

<!-- @section('script')
<script type="text/javascript">
	function getExpense(){
	    let from_date = $("#from_date").val();
	    let to_date = $("#to_date").val();
	    let url = '/admin/report/expense-list/'+from_date+'/'+to_date;
	    $.ajax({
	        type: "get",
	        url: url,
	        dataType: "json",
	        success: function (response) {
	            let html = '';
	            response.forEach(element => {
	            	console.log(element)
                	html+=`
		        			<tr>
			                	<td class="text-center">`+element.created_at+`</td>
			                	<td class="text-center">
			                		`+element.expense_category.expense_category_name+`
			                	</td>
			                	<td class="text-center">
			                		`+element.expense_resone+`
			                	</td>
			                	<td class="text-center">
			                		`+element.ammounts+`
			                	</td>
		                	</tr>
		        	`
	            });
	            $("#expense_list").html(html);
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
@endsection -->