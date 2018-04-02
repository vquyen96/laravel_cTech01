@extends('backend.product')
@section('content')

<h4 class="mainTitle">
	<span>Sản phẩm</span>
	/
	<span>Email</span>
	<a href="{{asset('admin/products/email/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
</h4>
<div>
	<table class="table table-hover">
	 	<tr>
	 		<th class="reponsive600">#</th>
	 		<th>Tên gói</th>
	 		<th>Giá</th>
	 		<th class="reponsive600 reponsive900">Dung lượng</th>
	 		<th class="reponsive600">Email</th>
	 		<th>Tùy chọn</th>
	 	</tr>
	 	@foreach($hostlist as $item)
			 @if($max < $item->product_id)
			 	<tr>
			 		<td class="reponsive600">{{$item->product_id}}</td>
			 		<td>{{$item->name}}</td>
			 		<td>
			 			<span class="price">{{number_format($item->price,0,',','.')}}<sup>đ</sup>/</span>
			 			{{$item->time}}
			 		</td>
			 		<td class="reponsive600 reponsive900">{{$item->capacity}}</td>
			 		<td class="reponsive600">{{$item->email_address}}</td>
			 		<td class="tableOption">
			 			<a href="{{asset('admin/products/email/edit/'.$item->product_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/email/delete/'.$item->product_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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