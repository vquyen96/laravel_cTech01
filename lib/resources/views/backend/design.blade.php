@extends('backend.product')
@section('content')

<h4 class="mainTitle">
	<span>Sản phẩm</span>
	/
	<span>Design</span>
	<a href="{{asset('admin/products/design/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
</h4>
<div>
	<table class="table table-hover">
	 	<tr>
	 		<th>#</th>
	 		<th>Tên gói</th>
	 		<th>Giá</th>
	 		<th>Tùy chọn</th>
	 	</tr>
	 	@foreach($hostlist as $item)
	 		@if($max < $item->product_id)
			 	<tr>
			 		<td>{{$item->product_id}}</td>
			 		<td>{{$item->name}}</td>
			 		<td>
			 			{{number_format($item->price,0,',','.')}}<sup>đ</sup>
			 			/{{$item->time}}
			 		</td>

			 		<td>
			 			<a href="{{asset('admin/products/design/edit/'.$item->product_id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/design/delete/'.$item->product_id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
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