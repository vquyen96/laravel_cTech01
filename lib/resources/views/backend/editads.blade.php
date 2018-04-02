@extends('backend.product')
@section('content')

	

	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Sửa Quảng Cáo
		</h4>
		<form method="post">
			<div class="row" >
				<div class="col-md-12">
					<div class="form-group">
						<label>Tên gói cước</label>
						<input type="text" class="form-control" value="{{$ads->name}}" name="name" required>
					</div>
				</div>
				{{-- <div class="col-md-6">
					<div class="form-group">
						<label>Giá</label>
						<input type="number" class="form-control" value="{{$ads->price}}" name="price" required>
					</div>
				</div> --}}
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Số từ khóa</label>
						<input type="text" class="form-control" value="{{$ads->num_of_keyword}}" name="num_of_keyword" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Số mẫu quảng cáo</label>
						<input type="text" class="form-control" value="{{$ads->num_of_ads}}" name="num_of_ads" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Báo cáo</label>
						<input type="text" class="form-control" value="{{$ads->report}}" name="report" required>
						
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Đặt logo trên bang.vn</label>
						<input type="text" class="form-control" value="{{$ads->set_logo}}" name="set_logo" required>
					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí cài đặt</label>
						<input type="text" class="form-control" value="{{$ads->install_fee}}" name="install_fee" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Vị trí hiển thị</label>
						<input type="text" class="form-control" value="{{$ads->display_position}}" name="display_position" required>

					</div>
				</div>
			</div>
			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí quảng cáo</label>
						<input type="text" class="form-control" value="{{$ads->ads_fee}}" name="ads_fee" required>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label>Phí dịch vụ</label>
						<input type="text" class="form-control" value="{{$ads->service_fee}}" name="service_fee" required>
					</div>
				</div>
			</div>


			<div class="row" >
				<div class="col-md-6">
					<div class="form-group">
						<label>Danh Mục</label>
						<select class="form-control" name="cate">
							@foreach($catelist as $item)
							<option value="{{$item->id}}" @if($ads->cate == $item->id)@endif>{{$item->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/products/ads')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
	<div class="col-md-6 col-sm-8">
		<h4 class="mainTitle">
			Gói cước -- 

			<a href="{{asset('admin/products/price/home/4/'.$ads->id)}}" class="btn btn-primary">Thêm gói</a>
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
		 			<a href="{{asset('admin/products/price/edit/4/'.$item->product_id.'/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
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