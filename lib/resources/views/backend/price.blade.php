@extends('backend.product')
@section('content')

<div>
	<div class="col-md-6">
		<h2>Thêm mới</h2>
		<form method="post">
			@include('errors.note')
			<div class="row" >
				<div class="form-group">
					<label>Thời gian</label>
					<input type="text" name="time" class="form-control" required>
				</div>
			</div>
			<div class="row" >
				<div class="form-group">
					<label>Giá</label>
					<input type="number" name="price" class="form-control" required>
				</div>
			</div>

			<div class="row" >
				<div class="form-group">
					<label>Giá cũ</label>
					<input type="number" name="old_price" class="form-control" required>
				</div>
			</div>

			<div class="row">
				<div class="form-group">
					<input type="submit" name="" class="btn btn-primary" value="Thêm mới">
					<a href="{{asset('admin/products/'.$product_name.'/edit/'.$product_id)}}" class="btn btn-warning">Quay lại</a>
				</div>
			</div>
			
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6">
		<h2>Danh sách danh mục</h2>
		<table class="table table-hover">
		 	<tr>
		 		<th>Giá</th>
		 		<th>Giá cũ</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($price as $item)
		 	<tr>
		 		<td>
					<span class="price">{{number_format($item->price,0,',','.')}}<sup>đ</sup>/</span>
		 			<span>
		 				{{$item->time}}
		 			</span>
				</td>
				<td>
					<span class="price">{{number_format($item->old_price,0,',','.')}}<sup>đ</sup></span>
		 			
				</td>
		 		<td>
			 			<a href="{{asset('admin/products/price/edit/'.$cate_id.'/'.$product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
						<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/price/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
			 		</td>
		 	</tr>
		 	@endforeach
		 	
		</table>
	</div>
	
</div>
@stop