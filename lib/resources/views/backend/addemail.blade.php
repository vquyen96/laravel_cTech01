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
						<label>Địa chỉ Email</label>
						<input type="text" class="form-control" name="email_address" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Email forwarder</label>
						<input type="text" class="form-control" name="emai_forwarder" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Mail list</label>
						<input type="text" class="form-control" name="mail_list" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Park domain</label>
						<input type="text" class="form-control" name="park_domain" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Add-on Domain</label>
						<input type="text" class="form-control" name="add_on_domain" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Private IP</label>
						<input type="text" class="form-control" name="private_ip" required>
						
					</div>
				</div>
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
				<a href="{{asset('admin/products/email')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>
@stop