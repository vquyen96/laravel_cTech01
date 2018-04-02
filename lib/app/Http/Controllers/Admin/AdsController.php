<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ads;
use App\Models\CateAds;
use DB;
use App\Models\Price;

class AdsController extends Controller
{
    public function getList(){
        $data['max']=0;
        $data['hostlist'] =DB::table('ads')
            ->join('price', 'ads.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 4')
            ->paginate(8);

    	// $data['hostlist'] = Ads::where('id', '>',0)->paginate(8);
    	$data['catename'] = 'cateads';
    	$data['cateleft'] = 'products';
    	return view('backend.ads',$data);
    }
    public function getCate($id){
        $data['max']=0;
        $data['hostlist'] =DB::table('ads')
            ->join('price', 'ads.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 4 AND ads.cate = '.$id )
            
            ->paginate(8);

    	// $data['hostlist'] = Ads::where('cate', $id)->paginate(8);
    	$data['catename'] = 'cateads';
        $data['cateleft'] = 'products';
    	return view('backend.Ads',$data);
    }
    public function getAdd(){
    	$data['catelist'] = CateAds::all();
        $data['catename'] = 'cateads';
        $data['cateleft'] = 'products';
    	return view('backend.addads', $data);
    }
    public function postAdd(Request $requests){
    	$ads = new Ads;
        $ads->name = $requests->name;
        $ads->price = $requests->price;
        $ads->num_of_keyword = $requests->num_of_keyword;
        $ads->num_of_ads = $requests->num_of_ads;
        $ads->report = $requests->report;
        $ads->set_logo = $requests->set_logo;
        $ads->install_fee = $requests->install_fee;
        $ads->display_position = $requests->display_position;
        $ads->ads_fee = $requests->ads_fee;
        $ads->service_fee = $requests->service_fee;
        $ads->cate = $requests->cate;
        $ads->save();

        $price = new Price;
        $price->time = 'OneTime';
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 4;
        $price->product_id = $ads->id;
        $price->save();
    	return redirect('admin/products/ads');
    	
    }
    public function getEdit($id){
    	$data['ads'] = Ads::find($id);
        $cate_id = 4;
        
        $data['price'] = Price::whereRaw('cate_id = '.$cate_id.' AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'cateads';
        $data['cateleft'] = 'products';
    	$data['catelist'] = CateAds::all();
    	return view('backend.editads',$data);
    }
    public function postEdit(Request $requests, $id){
    	$ads = Ads::find($id);
    	$ads->name = $requests->name;
        $ads->price = $requests->price;
        $ads->num_of_keyword = $requests->num_of_keyword;
        $ads->num_of_ads = $requests->num_of_ads;
        $ads->report = $requests->report;
        $ads->set_logo = $requests->set_logo;
        $ads->install_fee = $requests->install_fee;
        $ads->display_position = $requests->display_position;
        $ads->ads_fee = $requests->ads_fee;
        $ads->service_fee = $requests->service_fee;
        $ads->cate = $requests->cate;
    	$ads->save();
    	return redirect('admin/products/ads');
    }
    public function deleteCate($id){
    	Ads::destroy($id);
    	return back();
    }
}
