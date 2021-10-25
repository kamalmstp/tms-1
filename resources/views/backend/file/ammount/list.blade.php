@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Ammounts Table</b></h3>
	        <a href="{{route('ammount.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Ammounts
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Collection Point Name &nbsp;</th>
	                        <th class="text-center">Ammount &nbsp;</th>
	                        <th class="text-center">Status &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($ammounts as $ammount)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
		                	<td class="text-center">
		                		{{$ammount->collection? $ammount->collection->collection_point_name : 'null'}}
		                	</td>
		                	<td class="text-center">{{$ammount->ammounts}}</td>
		                	<td class="text-center">
		                		@if($ammount->status == 1)
		                			<span class="badge badge-success">Active</span>
		                		@else
		                			<span class="badge badge-danger">Inactive</span>
		                		@endif
		                	</td>
		                	<td class="text-center icon-statte">
	                            <form action="{{route('ammount.delete',$ammount->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('ammount.status',$ammount->id)}}" class="btn btn-circle mr-5 mb-5 {{$ammount->status == 1 ? 'btn-alt-success' :'btn-alt-danger'}}">
		                                <i class="fa fa-refresh {{$ammount->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a href="{{route('ammount.edit',$ammount->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
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