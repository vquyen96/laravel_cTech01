<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateSoft;
use App\Http\Requests\AddCateSoftRequest;
use App\Http\Requests\EditCateSoftRequest;

class CateSoftController extends Controller
{
    public function getList(){
    	$data['catelist'] = CateSoft::all();
    	$data['catename'] = 'catesoft';
        $data['cateleft'] = 'products';
    	return view('backend.catehost',$data);
    }
    public function addCate(AddCateSoftRequest $requests){
    	$catehost = new CateSoft;
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return back();
    }
    public function getEditCate($id){
    	$data['cate'] = CateSoft::find($id);
        $data['catename'] = 'catesoft';
        $data['cateleft'] = 'products';
    	return view('backend.editcatehost',$data);
    }
    public function postEditCate(EditCateSoftRequest $requests, $id){
    	$catehost = CateSoft::find($id);
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return redirect('admin/products/catesoft');
    }
    public function deleteCate($id){
    	CateSoft::destroy($id);
    	return back();
    }
}
