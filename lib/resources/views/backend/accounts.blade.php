@extends('backend.master')
@section('title','Tài khoản')
@section('main')
<div class="main">
	
	<h4 class="mainTitle">
		
		<span>Tài khoản</span>
		<a href="{{asset('admin/account/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
	</h4>
	<div>
		<table class="table table-hover">
		 	<tr>
		 		<th>#</th>
		 		<th>Email</th>
		 		<th>Chức năng</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	{{-- {{$user->level}} --}}
		 	@foreach($acclist as $item)
		 	<tr>
		 		<td>{{$item->id}}</td>
		 		<td>{{$item->email}}</td>
		 		<td>@if($item->level == 1) Chủ @else Quản lý @endif</td>
		 		<td class="tableOption">
		 			@if($user->level == 1)
		 			<a href="{{asset('admin/account/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a  @if($user->id == $item->id) onclick="return alert('Bạn không được xóa chính mình');" @else onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/account/delete/'.$item->id)}}" @endif class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
					@endif
		 		</td>
		 	</tr>
		 	@endforeach
		 </table>
		 {{$acclist->links()}}
	</div>
	
</div>
@stop