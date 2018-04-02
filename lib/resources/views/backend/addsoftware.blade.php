@extends('backend.product')
@section('content')

<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

	<h4 class="mainTitle">
		<span>Sản phẩm</span>
		/
		<span>Software</span>
	</h4>

	<div class="col-md-8 col-sm-10">
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
						<label>Dung lượng</label>
						<input type="text" class="form-control" name="capacity" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" name="price" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Thời gian</label>
						<input type="text" class="form-control" name="time" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Số bản Backup</label>
						<input type="text" class="form-control" name="num_of_backup" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Lịch Backup</label>
						<input type="text" class="form-control" name="backup_calendar" required>
						
					</div>
				</div>
				
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Data Center</label>
						<input type="text" class="form-control" name="data_center" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phân loại</label>
						<select class="form-control" name="species">
							<option value="1">INTERNAL</option>
							<option value="2">EXTERNAL</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
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