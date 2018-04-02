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
					<input type="text" name="email" value="{{$account->email}}" class="form-control" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Mật khẩu</label>
					<input type="text" name="password" value="{{$account->password}}" class="form-control" required>
				</div>
			</div>
			@if($user->level == 1)
			<div class="" >
				<div class="form-group">
					<label>Chức năng</label>
					<select class="form-control" name="level">
						<option value="2" @if($account->level == 2) selected @endif>Quản lý</option>
						<option value="1" @if($account->level == 1) selected @endif>Chủ</option>
					</select>
				</div>
			</div>
			@endif
			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/account')}}" class="btn btn-warning">Quay lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>

@stop