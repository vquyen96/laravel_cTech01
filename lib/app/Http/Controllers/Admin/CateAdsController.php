<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateAds;
use App\Http\Requests\AddCateAdsRequest;
use App\Http\Requests\EditCateAdsRequest;
class CateAdsController extends Controller
{
    public function getList(){
    	$data['catelist'] = CateAds::all();
    	$data['catename'] = 'cateads';
        $data['cateleft'] = 'products';
    	return view('backend.catehost',$data);
    }
    public function addCate(AddCateAdsRequest $requests){
    	$catehost = new CateAds;
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate'] = CateAds::find($id);
        $data['catename'] = 'cateads';
        $data['cateleft'] = 'products';
    	return view('backend.editcatehost',$data);
    }
    public function postEditCate(EditCateAdsRequest $requests, $id){
    	$catehost = CateAds::find($id);
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return redirect('admin/products/cateads');
    }
    public function deleteCate($id){
    	CateAds::destroy($id);
    	return back();
    }
}
