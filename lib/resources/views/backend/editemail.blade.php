@extends('backend.product')
@section('content')

	

	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Sửa email
		</h4>
		<form method="post">
			<div class="row" >
				<div class="col-md-12">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" value="{{$email->name}}" name="name" required>
					</div>
				</div>
				{{-- <div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" value="{{$email->price}}" name="price" required>
					</div>
				</div> --}}
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Dung Lượng</label>
						<input type="text" class="form-control" value="{{$email->capacity}}" name="capacity" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Địa chỉ Email</label>
						<input type="text" class="form-control" value="{{$email->email_address}}" name="email_address" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Email forwarder</label>
						<input type="text" class="form-control" value="{{$email->emai_forwarder}}" name="emai_forwarder" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Mail list</label>
						<input type="text" class="form-control" value="{{$email->mail_list}}" name="mail_list" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Park domain</label>
						<input type="text" class="form-control" value="{{$email->park_domain}}" name="park_domain" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Add-on Domain</label>
						<input type="text" class="form-control" value="{{$email->add_on_domain}}" name="add_on_domain" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Private IP</label>
						<input type="text" class="form-control" value="{{$email->private_ip}}" name="private_ip" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Danh Mục</label>
						<select class="form-control" name="cate">
							@foreach($catelist as $item)
							<option value="{{$item->id}}" @if($email->cate == $item->id) selected @endif>{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/products/email')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>

	</div>
	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Gói cước -- 

			<a href="{{asset('admin/products/price/home/2/'.$email->id)}}" class="btn btn-primary">Thêm gói</a>
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
		 			<a href="{{asset('admin/products/price/edit/2/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
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