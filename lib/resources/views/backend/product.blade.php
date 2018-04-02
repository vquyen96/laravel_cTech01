@extends('backend.master')
@section('title','Sản phẩm')
@section('main')
<div class="main">
	<div class="mainHead">	
		<ul class="nav nav-tabs">
		  <li role="presentation" class="@if($catename == "catehosting") active @endif">
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      Hosting <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		    	@foreach($catehosting as $item)
			    <li><a href="{{asset('admin/products/hosting/cate/'.$item->id)}}">{{$item->name}}</a></li>
			    @endforeach
		      	<li role="separator" class="divider"></li>
    			<li>
    				<a href="{{asset('admin/products/catehosting')}}">Sửa</a>
    			</li>
    			<li>
    				<a href="{{asset('admin/products/hosting')}}">Tất cả</a>
    			</li>
		    </ul>
		  </li>
		  <li role="presentation" class="@if($catename == "cateemail") active @endif">
		  	
		  	<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      Email Sever <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      	@foreach($cateemail as $item)
			    <li><a href="{{asset('admin/products/email/cate/'.$item->id)}}">{{$item->name}}</a></li>
			    @endforeach
		      	<li role="separator" class="divider"></li>
    			<li><a href="{{asset('admin/products/cateemail')}}">Sửa</a></li>
		      	<li><a href="{{asset('admin/products/email')}}">Tất cả</a></li>
		    </ul></li>
		  </li>
		  
		  <li role="presentation" class="@if($catename == "cateserver") active @endif">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      Sever <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      	@foreach($cateserver as $item)
			    <li><a href="{{asset('admin/products/server/cate/'.$item->id)}}">{{$item->name}}</a></li>
			    @endforeach
		      	<li role="separator" class="divider"></li>
    			<li><a href="{{asset('admin/products/cateserver')}}">Sửa</a></li>
    			<li><a href="{{asset('admin/products/server')}}">Tất cả</a></li>
		    </ul>
		  </li>
		  <li role="presentation" class="@if($catename == "cateads") active @endif">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      Advertisement <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      	@foreach($cateads as $item)
			    <li><a href="{{asset('admin/products/ads/cate/'.$item->id)}}">{{$item->name}}</a></li>
			    @endforeach
		      	<li role="separator" class="divider"></li>
    			<li><a href="{{asset('admin/products/cateads')}}">Sửa</a></li>
    			<li><a href="{{asset('admin/products/ads')}}">Tất cả</a></li>
		    </ul>
		  </li>
		  <li role="presentation" class="@if($catename == "catesoft") active @endif">
		    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
		      Software <span class="caret"></span>
		    </a>
		    <ul class="dropdown-menu">
		      	@foreach($catesoft as $item)
			    <li><a href="{{asset('admin/products/software/cate/'.$item->id)}}">{{$item->name}}</a></li>
			    @endforeach
		      	<li role="separator" class="divider"></li>
    			<li><a href="{{asset('admin/products/catesoft')}}">Sửa</a></li>
    			<li><a href="{{asset('admin/products/software')}}">Tất cả</a></li>
		    </ul>
		  </li>
		  <li role="presentation" class="@if($catename == "design") active @endif"><a href="{{asset('admin/products/design')}}">Design</a></li>
		  <li role="presentation" class="@if($catename == "bonus") active @endif"><a href="{{asset('admin/products/bonus')}}">Bonus</a></li>
		</ul>
	</div>
	@yield('content')
	
	
</div>
@stop