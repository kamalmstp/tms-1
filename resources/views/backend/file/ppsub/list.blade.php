@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>Police Payment Sub Sector Table</b></h3>
	        <a href="{{route('ppsub.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add Police Payment Sub Sector
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">Police Payment Main Sector Name &nbsp;</th>
	                        <th class="text-center">Police Payment Sub Sector Name &nbsp;</th>
	                        <th class="text-center">Phone &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($ppsub as $data)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
	                		<td class="text-center">
	                			{{$data->policmain? $data->policmain->sector_name : 'null'}}
	                		</td>
		                	<td class="text-center">{{$data->sub_sector_name}}</td>
		                	<td class="text-center">{{$data->phone}}</td>
		                	<td class="text-center icon-statte">
	                            <form action="{{route('ppsub.delete',$data->id)}}" method="post" accept-charset="utf-8">

			                		<a href="{{route('ppsub.edit',$data->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
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