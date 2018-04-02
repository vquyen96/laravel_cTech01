@extends('backend.product')
@section('content')

	

	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Sửa Sever
		</h4>
		<form method="post">
			<div class="row" >
				<div class="col-md-12">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" value="{{$server->name}}" name="name" required>
					</div>
				</div>
				{{-- <div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" value="{{$server->price}}" name="price" required>
					</div>
				</div> --}}
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>CPU</label>
						<input type="text" class="form-control" value="{{$server->cpu}}" name="cpu" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Dung Lượng</label>
						<input type="text" class="form-control" value="{{$server->capacity}}" name="capacity" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>User</label>
						<input type="text" class="form-control" value="{{$server->user}}" name="user" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Core</label>
						<input type="text" class="form-control" value="{{$server->core}}" name="core" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>HDD</label>
						<input type="text" class="form-control" value="{{$server->hdd}}" name="hdd" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ram</label>
						<input type="text" class="form-control" value="{{$server->ram}}" name="ram" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Ram Free</label>
						<input type="text" class="form-control" value="{{$server->ramfree}}" name="ramfree" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Bandwidth</label>
						<input type="text" class="form-control" value="{{$server->bandwidth}}" name="bandwidth" required>
						
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Tốc độ</label>
						<input type="text" class="form-control" value="{{$server->speed}}" name="speed" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>IP</label>
						<input type="text" class="form-control" value="{{$server->ip}}" name="ip" required>
						
					</div>
				</div>
			</div>

			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Hosting</label>
						<select class="form-control" name="species">
							<option value="1" @if($server->species == 1) selected @endif>LINUX HOSTING</option>
							<option value="2" @if($server->species == 2) selected @endif>WINDOWS HOSTING</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Danh Mục</label>
						<select class="form-control" name="cate">
							@foreach($catelist as $item)
							<option value="{{$item->id}}" @if($server->cate == $item->id) selected @endif>{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/products/server')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Gói cước -- 

			<a href="{{asset('admin/products/price/home/3/'.$server->id)}}" class="btn btn-primary">Thêm gói</a>
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
		 			<a href="{{asset('admin/products/price/edit/3/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
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