@extends('backend.master')
@section('title','News')
@section('main')
<div class="main">
	<link rel="stylesheet" href="css/news.css">
	<h4 class="mainTitle">
		<span>Tin tức</span>
		<a href="{{asset('admin/news/add')}}" class="btn btn-primary btnAdd">Thêm mới</a>
	</h4>
	<div>
		<table class="table table-hover">
		 	<tr>
		 		<th>#</th>
		 		<th>Ảnh</th>
		 		<th class="reponsive900">Tiêu đề</th>
		 		<th class="">Tag</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($news as $item)
		 	<tr>
		 		<td>{{$item->id}}</td>
		 		<td class="mainListImg">
		 			<img src="{{asset('lib/storage/app/news/'.$item->img)}}" class="thumbnail" alt="">
		 		</td>
		 		<td class="mainListTitle reponsive900">{{$item->title}}</td>
		 		<td class="mainListTag "><a href="">{{$item->tag}}</a></td>
		 		<td class="mainListOption">
		 			<a href="{{asset('admin/news/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="{{asset('admin/news/delete/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
		 		</td>
		 	</tr>
		 	@endforeach
		</table>
	</div>
	<div>
		{{$news->links()}}
	</div>
</div>
@stop