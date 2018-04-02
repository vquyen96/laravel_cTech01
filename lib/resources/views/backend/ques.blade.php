@extends('backend.master')
@section('title','Ques')
@section('main')

<link rel="stylesheet" href="css/ques.css">
<div class="main">
	<h3 class="mainTitle">
		<span>Tin tức</span>
		<a href="{{asset('admin/ques/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
	</h3>
	<div>
		<table class="table table-hover">
		 	<tr>
		 		<th>#</th>
		 		<th>Câu hỏi</th>
		 		<th class="reponsive600 reponsive900">Trả lời</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($ques as $item)
		 	<tr>
		 		<td>{{$item->id}}</td>
		 		<td class="mainListQues">{{$item->ques}}</td>
		 		<td class="mainListAns reponsive600 reponsive900">
		 			<div class="tableContent">
		 				{!!$item->ans!!}
		 			</div>
		 			
				</td>
		 		<td class="mainListOption">
		 			<a href="{{asset('admin/ques/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/ques/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
		 		</td>
		 	</tr>
		 	@endforeach
		</table>
	</div>
	<div>
		{{$ques->links()}}
	</div>
</div>
@stop