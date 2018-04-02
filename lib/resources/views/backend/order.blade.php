@extends('backend.master')
@section('title','Đơn hàng')
@section('main')

<div class="main">
	
	<h4 class="mainTitle">
		Đơn hàng
	</h4>
	<div>
		<table class="table table-hover orderTable">
		 	<tr>
		 		<th class="reponsive900 reponsive600">Mă đơn</th>
		 		<th>Tên khách hàng</th>
		 		<th class="reponsive900 reponsive600">Email</th>
		 		<th class="reponsive600">SDT</th>
		 		<th>Hóa đơn</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($acclist as $item)
		 	<tr>
		 		<td class="reponsive900 reponsive600"><a href="{{asset('admin/order/detail/'.$item->id)}}">{{$item->id}}</a></td>
		 		<td><a href="{{asset('admin/order/detail/'.$item->id)}}">{{$item->name}}</a></td>
		 		<td class="reponsive900 reponsive600"><a href="{{asset('admin/order/detail/'.$item->id)}}">{{$item->email}}</a></td>
		 		<td class="reponsive600"><a href="{{asset('admin/order/detail/'.$item->id)}}">{{$item->phone}}</a></td>
		 		<td><a href="{{asset('admin/order/detail/'.$item->id)}}">{{$item->total_price}}</a><sup>đ</sup></td>
		 		<td class="tableOption">
		 			@if($item->status == 1)
		 			<a href="{{asset('admin/order/yes/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i>Nhận</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn từ chối đơn hàng của {{$item->name}}!')" href="{{asset('admin/order/no/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>Không</a>
					@endif
					@if($item->status == 0)
					Xong
					@endif
					@if($item->status == -1)
					Từ chối
					@endif
		 		</td>
		 	</tr>
		 	@endforeach
		 </table>
		 {{$acclist->links()}}
	</div>
	
</div>
@stop