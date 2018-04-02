@extends('backend.master')
@section('title','Tin tức')
@section('main')
<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="main">
	
	<h4 class="mainTitle">
		<span>Tin tức</span>
	</h4>

	<div class="col-md-8 col-sm-10">
		@include('errors.note')
		<form role="form" method="post" enctype="multipart/form-data">
			<div class="" >
				<div class="form-group">
					<label>Tiêu đề</label>
					<input type="text" class="form-control" name="title" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Tag</label>
					<input type="text" class="form-control" name="tag" required>
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Ảnh</label>
					<input required id="img" type="file" name="img" class="cssInput" onchange="changeImg(this)" style="display: none!important;">
                    <img style="cursor: pointer;" id="avatar" class="cssInput thumbnail" width="100%" src="img/new_seo-10-512.png">
				</div>
			</div>
			<div class="" >
				<div class="form-group">
					<label>Nội Dung</label>
					<textarea class="form-control ckeditor" rows="5" name="content"></textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('content',{
							language:'vi',
							filebrowserImageBrowseUrl: '../../ckfinder/ckfinder.html?Type=Images',
							filebrowserFlashBrowseUrl: '../../ckfinder/ckfinder.html?Type=Flash',
							filebrowserImageUploadUrl: '../../ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
							filebrowserFlashUploadUrl: '../../public/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
						});
					</script>

				</div>
			</div>

			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-primary" value="Thêm mới">
				<a href="{{asset('admin/news')}}" class="btn bnt-warning">Quay Lại</a>
			</div>
			{{csrf_field()}}
		</form>
	</div>
</div>

@stop