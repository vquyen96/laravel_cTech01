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
						<label>CPU</label>
						<input type="text" class="form-control" name="cpu" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Dung Lượng</label>
						<input type="text" class="form-control" name="capacity" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>User</label>
						<input type="text" class="form-control" name="user" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Core</label>
						<input type="text" class="form-control" name="core" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>HDD</label>
						<input type="text" class="form-control" name="hdd" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ram</label>
						<input type="text" class="form-control" name="ram" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Ram Free</label>
						<input type="text" class="form-control" name="ramfree" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Bandwidth</label>
						<input type="text" class="form-control" name="bandwidth" required>
						
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Tốc độ</label>
						<input type="text" class="form-control" name="speed" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>IP</label>
						<input type="text" class="form-control" name="ip" required>
						
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Hosting</label>
						<select class="form-control" name="species">
							<option value="1">LINUX HOSTING</option>
							<option value="2">WINDOWS HOSTING</option>
						</select>
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
				<a href="{{asset('admin/products/hosting')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>
@stop