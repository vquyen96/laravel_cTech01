@extends('backend.master')
@section('title','Đơn hàng')
@section('main')

<div class="main">
	
	<h3 class="mainTitle">
		Chi tiết đơn hàng 
		<a href="{{asset('admin/order')}}" class="btn btn-primary">Quay lại</a>
	</h3>
	<div class="col-md-8 col-sm-12">
		<div> <span class="orderDetailTitle">Tổng tiền : {{$order->total_price}}<sup>đ</sup> </span></div>
		<div class="row">
			<div class="col-md-6 col-sm-6 orderDetailTitle">
				@if($order->type == 1 )
					Họ tên : {{$order->name}}
				@else
					Doanh nghiệp : {{$order->name}}
				@endif
				
			</div>
			<div class="col-md-6 col-sm-6">
				
				@if($order->type == 1 )
					<span class="orderDetailTitle">Giới tính :</span> 
					@if($order->gender == 1)
						Nam
					@else 
						@if($order->gender == 2)
							Nữ
						@else
							Khác
						@endif
					@endif
				
				@endif
				
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<span class="orderDetailTitle">Điện thoại :</span> {{$order->phone}}
			</div>
			<div class="col-md-6 col-sm-6">
				@if($order->type == 1)
					<span class="orderDetailTitle">CMND:</span> {{$order->cmnd}}
				@else
					<span class="orderDetailTitle">MST:</span> {{$order->mst}}
				@endif
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<span class="orderDetailTitle">Email :</span> {{$order->email}}
			</div>
			<div class="col-md-6 col-sm-6">
				<span class="orderDetailTitle">Địa chỉ :</span> {{$order->adress}} 
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-6 col-sm-6">
				<span class="orderDetailTitle">Tư vấn :</span> {{$order->couselor}}
			</div>
			<div class="col-md-6 col-sm-6">
				<span class="orderDetailTitle">Ghi chú :</span> {{$order->note}} 
			</div>
			
		</div>
		
	</div>
	<div>
		<table class="table table-hover">
		 	<tr>
		 		<th>Mă đơn</th>
		 		<th>Loại</th>
		 		<th>Tên gói</th>
		 		<th>Số lượng</th>
		 		<th>Giá</th>
		 	</tr>
		 	@foreach($list as $item)
		 	<tr>
		 		<td>{{$item->id}}</a></td>
		 		@switch($item->cate_id)
		 			@case (1):
		 				<td>Hosting</td>
		 				@break
		 			@case (2):
		 				<td>Email</td>
		 				@break
		 			@case (3):
		 				<td>Server</td>
		 				@break
		 			@case (4):
		 				<td>Ads</td>
		 				@break
		 			@case (5):
		 				<td>Software</td>
		 				@break
		 			@case (6):
		 				<td>Design</td>
		 				@break
		 			@case (7):
		 				<td>Bonus</td>
		 				@break
		 			
		 		@endswitch
		 		
		 		<td>{{$item->name}}</a></td>
		 		<td>{{$item->qty}}</a></td>
		 		
		 		<td>{{$item->price}}</a><sup>đ</sup>/{{$item->time}}</td>
		 		
		 	</tr>
		 	@endforeach
		 </table>
		 {{$list->links()}}
	</div>
	
</div>
@stop