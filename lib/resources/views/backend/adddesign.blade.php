@extends('backend.product')
@section('content')

	<h4 class="mainTitle">
		<span>Sản phẩm</span>
		/
		<span>Design</span>
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
						<label>Giao diện website</label>
						<input type="text" class="form-control" name="template" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Tên miền</label>
						<input type="text" class="form-control" name="domain" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label> Dung lượng lưu trữ </label>
						<input type="text" class="form-control" name="capacity" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Băng thông</label>
						<input type="text" class="form-control" name="bandwidth" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Email doanh nghiệp</label>
						<input type="text" class="form-control" name="email" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ngôn ngữ</label>
						<input type="text" class="form-control" name="language" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Responsive Design</label>
						<input type="text" class="form-control" name="responsive" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Bảo hành</label>
						<input type="text" class="form-control" name="warranty" required>

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