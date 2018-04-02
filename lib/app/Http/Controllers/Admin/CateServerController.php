<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateServer;
use App\Http\Requests\AddCateServerRequest;
use App\Http\Requests\EditCateServerRequest;
class CateServerController extends Controller
{
    public function getList(){
    	$data['catelist'] = CateServer::all();
    	$data['catename'] = 'cateserver';
        $data['cateleft'] = 'products';
    	return view('backend.catehost',$data);
    }
    public function addCate(AddCateServerRequest $requests){
    	$catehost = new CateServer;
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate'] = CateServer::find($id);
        $data['catename'] = 'cateserver';
        $data['cateleft'] = 'products';
    	return view('backend.editcatehost',$data);
    }
    public function postEditCate(EditCateServerRequest $requests, $id){
    	$catehost = CateServer::find($id);
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return redirect('admin/products/cateserver');
    }
    public function deleteCate($id){
    	CateServer::destroy($id);
    	return back();
    }
}
