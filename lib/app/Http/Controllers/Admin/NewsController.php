<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Http\Requests\AddNewsRequest;
class NewsController extends Controller
{
    public function getList(){
    	$data['news'] = News::where('id', '>',0)->paginate(8);
    	$data['catename'] = 'news';
    	$data['cateleft'] = 'news';
    	return view('backend.news',$data);
    }
    public function getAdd(){
        $data['catename'] = 'news';
        $data['cateleft'] = 'news';
    	return view('backend.addnews', $data);
    }
    public function postAdd(AddNewsRequest $request){
    	$image = $request->file('img');
    	if ($request->hasFile('img')) {
	    	$filename = $image->getClientOriginalName();
	    	$news = new News;
	        $news->title = $request->title;
	        $news->tag = $request->tag;
	        $news->img = $filename;
	        $news->content = $request->content;
	        $news->save();
	        $request->img->storeAs('news',$filename);
		}
    	
    	return redirect('admin/news');
    	
    }
    public function getEdit($id){
    	$data['news'] = News::find($id);
    	$data['catename'] = 'news';
        $data['cateleft'] = 'news';
    	return view('backend.editnews',$data);
    }

    public function postEdit(AddNewsRequest $request, $id){
    	$image = $request->file('img');
    	$news = News::find($id);
        $news->title = $request->title;
        $news->tag = $request->tag;
        $news->content = $request->content;

    	if ($request->hasFile('img')) {
	    	$filename = $image->getClientOriginalName();
	    	$news->img = $filename;
	        $request->img->storeAs('news',$filename);
		}
		$news->save();
    	return redirect('admin/news');
    }

    public function deleteCate($id){
    	News::destroy($id);
    	return back();
    }
}
