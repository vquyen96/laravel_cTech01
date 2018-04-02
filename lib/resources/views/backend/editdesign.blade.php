@extends('backend.product')
@section('content')

	

	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			<span>Sản phẩm</span>
			/
			<span>Design</span>
		</h4>
		<form method="post">
			<div class="row" >
				<div class="col-md-12">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" value="{{$design->name}}" name="name" required>
					</div>
				</div>
				{{-- <div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" value="{{$design->price}}" name="price" required>
					</div>
				</div> --}}
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Giao diện website</label>
						<input type="text" class="form-control" value="{{$design->template}}" name="template" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Tên miền</label>
						<input type="text" class="form-control" value="{{$design->domain}}" name="domain" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label> Dung lượng lưu trữ </label>
						<input type="text" class="form-control" value="{{$design->capacity}}" name="capacity" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Băng thông</label>
						<input type="text" class="form-control" value="{{$design->bandwidth}}" name="bandwidth" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Email doanh nghiệp</label>
						<input type="text" class="form-control" value="{{$design->email}}" name="email" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Ngôn ngữ</label>
						<input type="text" class="form-control" value="{{$design->language}}" name="language" required>
						
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Responsive Design</label>
						<input type="text" class="form-control" value="{{$design->responsive}}" name="responsive" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Bảo hành</label>
						<input type="text" class="form-control" value="{{$design->warranty}}" name="warranty" required>

					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/products/design')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Gói cước -- 

			<a href="{{asset('admin/products/price/home/6/'.$design->id)}}" class="btn btn-primary">Thêm gói</a>
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
		 			<a href="{{asset('admin/products/price/edit/6/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
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