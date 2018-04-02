<!DOCTYPE html>
<html>
<head>
	<title>@yield('title') | Admin cHost</title>
	<base href="{{asset('public/layout/backend')}}/">
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/styles.css">
	
</head>
<body>
	<header>
		<div class="container-fluid">
			<div class="headerLogo">
				<a href="">c-host admin</a>
			</div>
			<div class="headerUser"> 
				<a href="">
					<span class="glyphicon glyphicon-user"></span>
					<span>{{Auth::user()->email}}</span>
				</a>
				<a href="{{asset('logout')}}">
					<span class="glyphicon glyphicon-log-out"></span>
					<span>Đăng xuất</span>
				</a>
			</div>
		</div>

	</header>
	<div class="container-fluid bodyMain">
		<div class="row">
			<div class="col-md-2 col-sm-2 navMenu">
				<ul class="nav nav-pills nav-stacked row">
					<li @if($cateleft == 'account') class="active" @endif>
						<a href="{{asset('admin/account')}}">Tài khoản</a>
					</li>
					<li @if($cateleft == 'products') class="active" @endif>
						<a href="{{asset('admin/products/hosting')}}">Sản Phẩm</a>
					</li>
					<li @if($cateleft == 'order') class="active" @endif>
						<a href="{{asset('admin/order')}}">Đơn hàng</a>
					</li>
					<li @if($cateleft == 'news') class="active" @endif>
						<a href="{{asset('admin/news')}}">Tin tức</a>
					</li>
					<li @if($cateleft == 'ques') class="active" @endif>
						<a href="{{asset('admin/ques')}}">Câu hỏi</a>
					</li>

				</ul>
			</div>
			<div class="col-md-12 col-sm-12">
				@yield('main')
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function changeImg(input){
        //Nếu như tồn thuộc tính file, đồng nghĩa người dùng đã chọn file mới
        if(input.files && input.files[0]){
            var reader = new FileReader();
            //Sự kiện file đã được load vào website
            reader.onload = function(e){
                //Thay đổi đường dẫn ảnh
                $('#avatar').attr('src',e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('#avatar').click(function(){
            $('#img').click();
        });
    });
</script>
</body>
</html>