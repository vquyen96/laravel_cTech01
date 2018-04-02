@extends('backend.product')
@section('content')

<div>
	<div class="col-md-6">
		<h2>Thay Đổi</h2>
		<form method="post">
			@include('errors.note')
			<div class="" >
				<div class="form-group">
					<label>Tên danh mục</label>
					<input type="text" name="name" class="form-control" value="{{$cate->name}}" required>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/products/catehosting')}}" class="btn btn-warning"> Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
	
	
</div>
@stop