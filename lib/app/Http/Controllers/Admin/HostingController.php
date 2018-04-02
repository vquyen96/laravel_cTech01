<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hosting;
use App\Models\Price;
use App\Models\CateHosting;
use App\Http\Requests\AddHostingRequest;
use App\Http\Requests\EditHostingRequest;
use DB;
class HostingController extends Controller
{
    public function getList(){
        $data['max']=0;
        $data['hostlist'] =DB::table('hosting')
            ->join('price', 'hosting.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 1')
            
            ->paginate(8);

        // dd($data);
        // $data['pricelist'] = Price::all();
    	// $data['hostlist'] = Hosting::where('id', '>',0)->paginate(8);
    	$data['catename'] = 'catehosting';
    	$data['cateleft'] = 'products';
    	return view('backend.hosting',$data);

    }
    public function getCate($id){
        $data['max']=0;
        $data['hostlist'] =DB::table('hosting')
            ->join('price', 'hosting.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 1 AND hosting.cate = '.$id)
            
            ->paginate(8);

    	// $data['hostlist'] = Hosting::where('cate', $id)->paginate(8);
    	$data['catename'] = 'catehosting';
        $data['cateleft'] = 'products';
    	return view('backend.hosting',$data);
    }
    public function getAdd(){
    	$data['catelist'] = CateHosting::all();
        $data['catename'] = 'catehosting';
        $data['cateleft'] = 'products';
    	return view('backend.addhost', $data);
    }
    public function postAdd(AddHostingRequest $requests){
    	$hosting = new Hosting;
    	$hosting->name = $requests->name;
    	
        $hosting->capacity = $requests->capacity;
        $hosting->bandwidth = $requests->bandwidth;
        $hosting->email = $requests->email;
        $hosting->ftp = $requests->ftp;
        $hosting->mysql = $requests->mysql;
        $hosting->mssqlserver = $requests->mssqlserver;
        $hosting->domain = $requests->domain;
        $hosting->ssl = $requests->ssl;
        $hosting->species = $requests->species;
        $hosting->cate = $requests->cate;
    	$hosting->save();

        $price = new Price;
        $price->time = 'OneTime';
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 1;
        $price->product_id = $hosting->id;
        $price->save();

    	return redirect('admin/products/hosting');
    	
    }
    public function getEdit($id){
    	$data['host'] = Hosting::find($id);
        $data['price'] = Price::whereRaw('cate_id = 1 AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'catehosting';
        $data['cateleft'] = 'products';
    	$data['catelist'] = CateHosting::all();
    	return view('backend.edithosting',$data);
    }
    public function postEdit(EditHostingRequest $requests, $id){
    	$hosting = Hosting::find($id);
    	$hosting->name = $requests->name;
    	
        $hosting->capacity = $requests->capacity;
        $hosting->bandwidth = $requests->bandwidth;
        $hosting->email = $requests->email;
        $hosting->ftp = $requests->ftp;
        $hosting->mysql = $requests->mysql;
        $hosting->mssqlserver = $requests->mssqlserver;
        $hosting->domain = $requests->domain;
        $hosting->ssl = $requests->ssl;
        $hosting->species = $requests->species;
        $hosting->cate = $requests->cate;
    	$hosting->save();
    	return redirect('admin/products/hosting');
    }
    public function deleteCate($id){
    	Hosting::destroy($id);
    	return back();
    }
}
