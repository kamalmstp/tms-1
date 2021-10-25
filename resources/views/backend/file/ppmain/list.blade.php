@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Police Payment Main Sector Table</b></h3>
	        <a href="{{route('ppmain.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Police Payment Main Sector
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Expense Category &nbsp;</th>
	                        <th class="text-center">Police Payment Main Sector Name &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($ppmain as $data)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">
	                			{{$data->expenseCategory? $data->expenseCategory->expense_category_name : 'null'}}
	                		</td>
		                	<td class="text-center">{{$data->sector_name}}</td>
		                	<td class="text-center icon-statte">
	                            <form action="{{route('ppmain.delete',$data->id)}}" method="post" accept-charset="utf-8">

			                		<a href="{{route('ppmain.edit',$data->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
		                                <i class="fa fa-edit"></i>
		                            </a>
	                                @csrf
	                                @method('delete')
	    	                    	<button type="submit" class="btn btn-circle btn-alt-danger mr-5 mb-5 delete-confirm">
		                                <i class="fa fa-trash-o"></i>
		                            </button>
	                            </form>
		                	</td>
	                	</tr>
	                	@endforeach
	                </tbody>
	            </table>
	        </div>
	    </div>
	</div>
</div>
@endsection