@extends('backend.product')
@section('content')

<h4 class="mainTitle">
	<span>Sản phẩm</span>
	/
	<span>Hosting</span>
	/
	<span>Phổ thông</span>
	<a href="{{asset('admin/products/hosting/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
</h4>
<div>
	<table class="table table-hover">
	 	<tr>
	 		<th>#</th>
	 		<th>Name</th>
	 		<th>Price</th>
	 		<th>Dung lượng</th>
	 		<th>Băng thông</th>
	 		<th>Tùy chọn</th>
	 	</tr>
	 	
	 	@foreach($hostlist as $item)
	 		@if($max < $item->product_id)
			 	<tr>
			 		<td>{{$item->product_id}}</td>
			 		<td>{{$item->name}}</td>
			 		<td>
			 			<span class="price">{{number_format($item->price,0,',','.')}}<sup>đ</sup>/</span>
			 			{{$item->time}}
			 		</td>
			 		<td>{{$item->capacity}}</td>
			 		<td>{{$item->bandwidth}}</td>
			 		<td>
			 			<a href="{{asset('admin/products/hosting/edit/'.$item->product_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/hosting/delete/'.$item->product_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
			 		</td>
			 	</tr>
			 	@php
			 		$max = $item->product_id
			 	@endphp
			 	
			@endif
	 	@endforeach
	</table>
	<div>
		{{$hostlist->links()}}
	</div>
</div>
@stop