@extends('backend.master')
@section('title','Đơn hàng')
@section('main')

<div class="main">
	
	<form>
			<table class="table table-hover">
				<tr class="active">
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@foreach($items as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>
						<div class="form-group">
							<input class="form-control" type="number" onchange="updateCart(this.value,'{{$item->rowId}}')" value="{{$item->qty}}">
						</div>
					</td>
					<td><span class="price">{{number_format($item->price,0,',','.')}}đ</span></td>
					<td><span class="price">{{number_format($item->price*$item->qty,0,',','.')}}đ</span></td>
					<td><a href="{{asset('cart/delete/'.$item->rowId)}}">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">										
						Tổng thanh toán: <span class="total-price">{{$total}}đ</span>
																								
				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="#" class="my-btn btn">Mua tiếp</a>
					<a href="#" class="my-btn btn">Cập nhật</a>
					<a href="{{asset('cart/delete/all')}}" class="my-btn btn">Xóa giỏ hàng</a>
				</div>
			</div>
		</form>
	
	<div class="col-md-6 col-sm-8">
		<form method="post">
			<div class="" >
				<div class="form-group">
					<label>Hình thức</label>
					<select name="type" class="form-control">
						<option value="1">Cá Nhân</option>
						<option value="2">Doanh Nghiệp</option>
					</select>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Họ và tên</label>
					<input type="text" name="name" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>MST</label>
					<input type="text" name="mst" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Số CMND/ Passport</label>
					<input type="text" name="cmnd" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Địa chỉ</label>
					<input type="text" name="adress" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Di động/ Điện thoại bàn</label>
					<input type="number" name="phone" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Giới tính </label>
					<select name="gender" class="form-control" >
						<option value="1">Nam</option>
						<option value="2">Nữ</option>
						<option value="3">Khác</option>
					</select>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Nhân viên tư vấn</label>
					<input type="text" name="couselor" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Ghi chú đơn hàng</label>
					<input type="text" name="note" class="form-control" required>
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