<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateHosting;
use App\Http\Requests\AddCateHostingRequest;
use App\Http\Requests\EditCateHostingRequest;
class CateHostingController extends Controller
{
    public function getList(){
    	$data['catelist'] = CateHosting::all();
    	$data['catename'] = 'catehosting';
        $data['cateleft'] = 'products';
    	return view('backend.catehost',$data);
    }
    public function addCate(AddCateHostingRequest $requests){
    	$catehost = new CateHosting;
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate'] = CateHosting::find($id);
        $data['catename'] = 'catehosting';
        $data['cateleft'] = 'products';
    	return view('backend.editcatehost',$data);
    }
    public function postEditCate(EditCateHostingRequest $requests, $id){
    	$catehost = CateHosting::find($id);
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return redirect('admin/products/catehosting');
    }
    public function deleteCate($id){
    	CateHosting::destroy($id);
    	return back();
    }
}
