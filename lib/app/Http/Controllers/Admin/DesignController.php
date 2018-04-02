<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Design;
use App\Models\Price;
use DB;

class DesignController extends Controller
{
    public function getList(){
        $data['max'] = 0;
    	$data['hostlist'] =DB::table('design')
            ->join('price', 'design.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 6')
            ->paginate(8);
    	$data['catename'] = 'design';
    	$data['cateleft'] = 'products';
    	return view('backend.design',$data);
    }
    public function getAdd(){
        $data['catename'] = 'design';
        $data['cateleft'] = 'products';
    	return view('backend.adddesign', $data);
    }
    public function postAdd(Request $requests){
    	$design = new Design;
        $design->name = $requests->name;
        $design->template = $requests->template;
        $design->domain = $requests->domain;
        $design->capacity = $requests->capacity;
        $design->bandwidth = $requests->bandwidth;
        $design->email = $requests->email;
        $design->language = $requests->language;
        $design->responsive = $requests->responsive;
        $design->warranty = $requests->warranty;

        $design->save();

        $price = new Price;
        $price->time = 'OneTime';
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 6;
        $price->product_id = $design->id;
        $price->save();
    	return redirect('admin/products/design');
    	
    }
    public function getEdit($id){
    	$data['design'] = Design::find($id);
        $data['price'] = Price::whereRaw('cate_id = 6 AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'design';
        $data['cateleft'] = 'products';
    	return view('backend.editdesign',$data);
    }
    public function postEdit(Request $requests, $id){
    	$design = Design::find($id);
    	$design->name = $requests->name;
        $design->name = $requests->name;
        $design->price = $requests->price;
        $design->template = $requests->template;
        $design->domain = $requests->domain;
        $design->capacity = $requests->capacity;
        $design->bandwidth = $requests->bandwidth;
        $design->email = $requests->email;
        $design->language = $requests->language;
        $design->responsive = $requests->responsive;
        $design->warranty = $requests->warranty;
        
    	$design->save();
    	return redirect('admin/products/design');
    }
    public function deleteCate($id){
    	Design::destroy($id);
    	return back();
    }
}
