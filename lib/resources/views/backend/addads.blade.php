@extends('backend.product')
@section('content')

	<h4 class="mainTitle">
		<span>Sản phẩm</span>
		/
		<span>Server</span>
	</h4>

	<div class="col-md-6 col-sm-8">
		<form method="post">
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" name="name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" name="price" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Số từ khóa</label>
						<input type="text" class="form-control" name="num_of_keyword" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Số mẫu quảng cáo</label>
						<input type="text" class="form-control" name="num_of_ads" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Báo cáo</label>
						<input type="text" class="form-control" name="report" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Đặt logo trên bang.vn</label>
						<input type="text" class="form-control" name="set_logo" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí cài đặt</label>
						<input type="text" class="form-control" name="install_fee" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Vị trí hiển thị</label>
						<input type="text" class="form-control" name="display_position" required>

					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí quảng cáo</label>
						<input type="text" class="form-control" name="ads_fee" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí dịch vụ</label>
						<input type="text" class="form-control" name="service_fee" required>
					</div>
				</div>
			</div>


			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Danh Mục</label>
						<select class="form-control" name="cate">
							@foreach($catelist as $item)
							<option value="{{$item->id}}">{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thêm mới">
				<a href="{{asset('admin/products/hosting')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>
@stop