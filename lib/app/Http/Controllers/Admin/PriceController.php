<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;

class PriceController extends Controller
{
    public function getList($cate_id, $product_id){
    	$data['price'] = Price::whereRaw('cate_id = '.$cate_id.' AND product_id = '.$product_id)->paginate(8);
    	$data['cate_id'] = $cate_id;
    	$data['product_id'] = $product_id;
    	
    	$data['catename'] = 'catehosting';
    	switch ($cate_id) {
		    case 1:
		        $data['product_name'] = 'hosting';
    			$data['catename'] = 'catehosting';
		        break;
		    case 2:
		        $data['product_name'] = 'email';
    			$data['catename'] = 'cateemail';
		        break;
		    case 3:
		        $data['product_name'] = 'server';
    			$data['catename'] = 'cateserver';
		        break;
		    case 4:
		        $data['product_name'] = 'ads';
    			$data['catename'] = 'cateads';
		        break;
		    case 5:
		        $data['product_name'] = 'soft';
    			$data['catename'] = 'catesoft';
		        break;
		    
		    case 6:
		        $data['product_name'] = 'design';
    			$data['catename'] = 'design';
		        break;
		    
		    case 7:
		        $data['product_name'] = 'bonus';
    			$data['catename'] = 'bonus';
		        break;
		    
		}
        $data['cateleft'] = 'products';
    	return view('backend.price',$data);
    }
    public function postAdd(Request $request, $cate_id, $product_id){
    	$price = new Price;
    	$price->time = $request->time;
    	$price->price = $request->price;
    	$price->old_price = $request->old_price;
    	$price->cate_id = $cate_id;
    	$price->product_id = $product_id;
    	$price->save();

    	return redirect('admin/products/price/home/'.$cate_id.'/'.$product_id);
    }
    public function getEdit($cate_id, $product_id, $price_id){
    	$data['price'] = Price::whereRaw('cate_id = '.$cate_id.' AND product_id = '.$product_id)->paginate(8);
    	$data['edit_price'] = Price::find($price_id);
    	$data['cate_id'] = $cate_id;
    	$data['product_id'] = $product_id;
    	switch ($cate_id) {
		    case 1:
		        $data['product_name'] = 'hosting';
    			$data['catename'] = 'catehosting';
		        break;
		    case 2:
		        $data['product_name'] = 'email';
    			$data['catename'] = 'cateemail';
		        break;
		    case 3:
		        $data['product_name'] = 'server';
    			$data['catename'] = 'cateserver';
		        break;
		    case 4:
		        $data['product_name'] = 'ads';
    			$data['catename'] = 'cateads';
		        break;
		    case 5:
		        $data['product_name'] = 'soft';
    			$data['catename'] = 'catesoft';
		        break;
		    
		    case 6:
		        $data['product_name'] = 'design';
    			$data['catename'] = 'design';
		        break;
		    
		    case 7:
		        $data['product_name'] = 'bonus';
    			$data['catename'] = 'bonus';
		        break;
		    
		}
        $data['cateleft'] = 'products';
    	return view('backend.editprice',$data);
    }
    public function postEdit(Request $request, $cate_id, $product_id, $price_id){
    	$price = Price::find($price_id);
    	$price->time = $request->time;
    	$price->price = $request->price;
    	$price->old_price = $request->old_price;
    	$price->cate_id = $cate_id;
    	$price->product_id = $product_id;
    	$price->save();

    	return redirect('admin/products/price/edit/'.$cate_id.'/'.$product_id.'/'.$price_id);
    }
    public function delete($price_id){
    	Price::destroy($price_id);
    	return back();
    }
}
