@extends('backend.product')
@section('content')

	

	<div class="">
		<div class="col-md-6 col-sm-8">
			<h4 class="mainTitle">
				Sửa sản phẩm
			</h4>
			<form method="post">
				<div class="row" >
					<div class="col-md-12">
						<div class="form-group">
							<label>Tên gói cước</label>
							<input type="text" class="form-control" value="{{$host->name}}" name="name" required>
						</div>
					</div>
					{{-- <div class="col-md-6">
						<div class="form-group">
							<label>Giá</label>
							<input type="number" class="form-control" value="{{$host->price}}" name="price" required>
						</div>
					</div> --}}
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Dung Lượng</label>
							<input type="text" class="form-control" value="{{$host->capacity}}" name="capacity" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Băng thông</label>
							<input type="text" class="form-control" value="{{$host->bandwidth}}" name="bandwidth" required>
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Địa chỉ Email</label>
							<input type="text" class="form-control" value="{{$host->email}}" name="email" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Tài khoản FTP</label>
							<input type="text" class="form-control" value="{{$host->ftp}}" name="ftp" required>
							
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>MySQl</label>
							<input type="text" class="form-control" value="{{$host->mysql}}" name="mysql" required>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>MSSQL Server</label>
							<input type="text" class="form-control" value="{{$host->mssqlserver}}" name="mssqlserver" required>
							
						</div>
					</div>
				</div>
				<div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Park/ Addon Domain</label>
							<input type="text" class="form-control" value="{{$host->domain}}" name="domain" required>
							
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>SSL</label>
							<input type="text" class="form-control" value="{{$host->ssl}}" name="ssl" required>

						</div>
					</div>
				</div>

				<div class="row" >
					<div class="col-md-6">
						<div class="form-group">
							<label>Hosting</label>
							<select class="form-control" name="species">
								<option value="1" @if($host->species == 1) selected @endif>LINUX HOSTING</option>
								<option value="2" @if($host->species == 2) selected @endif>WINDOWS HOSTING</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label>Danh Mục</label>
							<select class="form-control" name="cate">
								@foreach($catelist as $item)
								<option value="{{$item->id}}" @if($host->cate == $item->id) selected @endif>{{$item->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
					<a href="{{asset('admin/products/hosting')}}" class="btn btn-warning">Quay lại</a>
				</div>
				{{csrf_field()}}
			</form>
		</div>
		<div class="col-md-6 col-sm-8">
			<h4 class="mainTitle">
				Gói cước -- 

				<a href="{{asset('admin/products/price/home/1/'.$host->id)}}" class="btn btn-primary">Thêm gói</a>
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
						<span class="price">{{number_format($item->old_price,0,',','.')}}<sup>đ</sup></span>
					</td>
			 		<td>
			 			<a href="{{asset('admin/products/price/edit/1/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
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
	
</div>
@stop