@extends('backend.product')
@section('content')

<div>
	<div class="col-md-6">
		<h2>Thêm mới</h2>
		<form method="post">
			@include('errors.note')
			<div class="" >
				<div class="form-group">
					<label>Tên danh mục</label>
					<input type="text" name="name" class="form-control" required>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thêm mới">
			</div>
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6">
		<h2>Danh sách danh mục</h2>
		<table class="table table-hover">
		 	<tr>
		 		<th>#</th>
		 		<th>Tên danh mục</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($catelist as $item)
		 	<tr>
		 		<td>{{$item->id}}</td>
		 		<td>{{$item->name}}</td>
		 		<td>
		 			<a href="{{asset('admin/products/'.$catename.'/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/'.$catename.'/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
		 		</td>
		 	</tr>
		 	@endforeach
		 	
		</table>
	</div>
	
</div>
@stop