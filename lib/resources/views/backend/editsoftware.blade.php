@extends('backend.product')
@section('content')

<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

	

	<div class="col-md-6 col-sm-10">
		<h4 class="mainTitle">
			Sửa phần mềm
		</h4>
		<form method="post">
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" value="{{$soft->name}}" name="name" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Dung lượng</label>
						<input type="text" class="form-control" value="{{$soft->capacity}}" name="capacity" required>
					</div>
				</div>
			</div>
			{{-- <div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" value="{{$soft->price}}" name="price" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Thời gian</label>
						<input type="text" class="form-control" value="{{$soft->time}}" name="time" required>
					</div>
				</div>
			</div> --}}
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Số bản Backup</label>
						<input type="text" class="form-control" value="{{$soft->num_of_backup}}" name="num_of_backup" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Lịch Backup</label>
						<input type="text" class="form-control" value="{{$soft->backup_calendar}}" name="backup_calendar" required>
						
					</div>
				</div>
				
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Data Center</label>
						<input type="text" class="form-control" value="{{$soft->data_center}}" name="data_center" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phân loại</label>
						<select class="form-control" name="species">
							<option value="1" @if($soft->species == 1) selected @endif>INTERNAL</option>
							<option value="2" @if($soft->species == 2) selected @endif>EXTERNAL</option>
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
							<option value="{{$item->id}}" @if($soft->cate == $item->id) selected @endif>{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay Đổi">
				<a href="{{asset('admin/products/software')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Gói cước -- 

			<a href="{{asset('admin/products/price/home/5/'.$soft->id)}}" class="btn btn-primary">Thêm gói</a>
		</h4>
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
					<span class="price">{{number_format($item->price,0,',','.')}}<sup>đ</sup></span>
				</td>
		 		<td>
		 			<a href="{{asset('admin/products/price/edit/5/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/products/price/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
		 		</td>
		 	</tr>
		 	@endforeach
		</table>
		<div>
			{{$price->links()}}
		</div>
	</div>
</div>
@stop