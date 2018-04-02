@extends('backend.master')
@section('title','Tài khoản')
@section('main')

<div class="col-md-10 col-sm-10 main">
	
	<h3 class="mainTitle">
		<span>Tài khoản</span>
	</h3>

	<div class="col-md-6 col-sm-8">
		<form method="post">
			<div class="" >
				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Mật khẩu</label>
					<input type="text" name="password" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Chức năng</label>
					<select class="form-control" name="level">
						<option value="2">Quản lý</option>
						@if($user->level == 1)
						<option value="1">Chủ</option>
						@endif
					</select>
				</div>
			</div>
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thêm mới">
				<a href="{{asset('admin/account')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>

@stop