<!DOCTYPE html>
<html>
<head>
	<title>Admin cHost</title>
	<base href="{{asset('public/layout/backend')}}/">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="loginForm">
		<div class="loginHead">
			<h3>Đăng Nhập</h3>
		</div>
		
		@include('errors.note')
		<form method="post">
			<div class="" >
				<div class="form-group">
					<label>Email</label>
					<input type="text" class="form-control" name="email" required>
				</div>
			</div>
			
			<div class="" >
				<div class="form-group">
					<label>Mật khẩu</label>
					<input type="text" class="form-control" name="password" required>
				</div>
			</div>

			<div class="form-group">
				<input type="submit" name="" class="btn btn-primary" value="Đăng nhập">
			</div>
			{{csrf_field()}}
		</form>
	</div>
	
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>