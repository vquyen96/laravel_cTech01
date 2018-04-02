@extends('backend.master')
@section('title','News')
@section('main')

<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>

<div class="col-md-10 col-sm-10 main">
	
	<h3 class="mainTitle">
		<span>Tin tức</span>
	</h3>

	<div class="col-md-6 col-sm-8">
		<form method="post">
			<div class="" >
				<div class="form-group">
					<label>Câu hỏi</label>
					<input type="text" class="form-control" value="{{$ques->ques}}" name="ques" required>
				</div>
			</div>
			
			<div class="" >
				<div class="form-group">
					<label>Trả lời</label>
					<textarea class="form-control ckeditor" rows="5" name="ans">{{$ques->ans}}</textarea>
					<script type="text/javascript">
						var editor = CKEDITOR.replace('ans',{
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
				<input type="submit" name="" class="btn btn-primary" value="Thay đổi">
				<a href="{{asset('admin/ques')}}"></a>
			</div>
			{{csrf_field()}}
		</form>
		
	</div>
</div>
@stop