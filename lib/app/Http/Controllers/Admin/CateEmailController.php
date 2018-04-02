<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CateEmail;
use App\Http\Requests\AddCateEmailRequest;
use App\Http\Requests\EditCateEmailRequest;
class CateEmailController extends Controller
{
    public function getList(){
    	$data['catelist'] = CateEmail::all();
    	$data['catename'] = 'cateemail';
        $data['cateleft'] = 'products';
    	return view('backend.catehost',$data);
    }
    public function addCate(AddCateEmailRequest $requests){
    	$catehost = new CateEmail;
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return back();
    }
    public function getEditCate($id){
        $data['catename'] = 'cateemail';
        $data['cateleft'] = 'products';
    	$data['cate'] = CateEmail::find($id);
    	return view('backend.editcatehost',$data);
    }
    public function postEditCate(EditCateEmailRequest $requests, $id){
    	$catehost = CateEmail::find($id);
    	$catehost->name = $requests->name;
    	$catehost->slug = str_slug($requests->name);
    	$catehost->save();
    	return redirect('admin/products/cateemail');
    }
    public function deleteCate($id){
    	CateEmail::destroy($id);
    	return back();
    }
}
