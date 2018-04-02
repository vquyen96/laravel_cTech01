@extends('backend.product')
@section('content')

	<h4 class="mainTitle">
		<span>Sản phẩm</span>
		/
		<span>Hosting</span>
		/
		<span>Phổ thông</span>
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
						<label>Dung Lượng</label>
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
						<label>Địa chỉ Email</label>
						<input type="text" class="form-control" name="email" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Tài khoản FTP</label>
						<input type="text" class="form-control" name="ftp" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>MySQl</label>
						<input type="text" class="form-control" name="mysql" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>MSSQL Server</label>
						<input type="text" class="form-control" name="mssqlserver" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Park/ Addon Domain</label>
						<input type="text" class="form-control" name="domain" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>SSL</label>
						<input type="text" class="form-control" name="ssl" required>

					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Hosting</label>
						<select class="form-control" name="species">
							<option value="1" selected="">LINUX HOSTING</option>
							<option value="2">WINDOWS HOSTING</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Danh Mục</label>
						<select class="form-control" name="cate">
							@foreach($catelist as $item)
							<option value="{{$item->id}}" selected="">{{$item->name}}</option>
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