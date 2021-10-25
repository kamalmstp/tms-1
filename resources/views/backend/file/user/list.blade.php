@extends('backend.layouts.app')
@section('content')
<div class="container">
	<div class="block">
	    <div class="block-header block-header-default">
	        <h3 class="block-title"><b>User Table</b></h3>
	        <a href="{{route('user.create')}}" class="btn btn-sm btn-alt-primary">
	            <i class="fa fa-plus mr-5"></i>Add User
	        </a>
	    </div>
	    <div class="block-content block-content-full">
	    	<div class="table-responsive">
	            <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
	                <thead>
	                    <tr>
	                        <th class="text-center">S/L &nbsp;</th>
	                        <th class="text-center">User Name &nbsp;</th>
	                        <th class="text-center">User Type &nbsp;</th>
	                        <th class="text-center">Phone &nbsp;</th>
	                        <th class="text-center">NID Image &nbsp;</th>
	                        <th class="text-center">Status &nbsp;</th>
	                        <th class="text-center">Action &nbsp;</th>
	                    </tr>
	                </thead>
	                <tbody>
	                	@php $sl = 1; @endphp
                    	@foreach($users as $user)
	                	<tr>
	                		<td class="text-center">{{$sl++}}</td>
		                	<td class="text-center">{{$user->user_name}}</td>
		                	<td class="text-center">
		                		{{$user->userType? $user->userType->user_type : 'null'}}
		                	</td>
		                	<td class="text-center">{{$user->phone}}</td>
		                	<td class="text-center"><a target="_blank" href="/{{$user->image}}"><img style="width: 50px; height: 50px;" src="{{$user->image ? '/' . $user->image :  '/asset/backend_asset/assets/media/various/image-svgrepo-com.svg'}}"></a></td>
		                	<td class="text-center">
		                		@if($user->status == 1)
		                			<span class="badge badge-success">Active</span>
		                		@else
		                			<span class="badge badge-danger">Inactive</span>
		                		@endif
		                	</td>
		                	<td class="text-center icon-statte">
	                            <form action="{{route('user.delete',$user->id)}}" method="post" accept-charset="utf-8">
	                            	<a href="{{route('user.status',$user->id)}}" class="btn btn-circle mr-5 mb-5 {{$user->status == 1 ? 'btn-alt-success' :'btn-alt-danger'}}">
		                                <i class="fa fa-refresh {{$user->status == 1 ? 'text-success' :'text-danger'}}"></i>
		                            </a>

			                		<a href="{{route('user.edit',$user->id)}}" class="btn btn-circle btn-alt-info mr-5 mb-5">
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