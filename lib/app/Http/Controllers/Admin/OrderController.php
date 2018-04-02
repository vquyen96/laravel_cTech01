<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Order;
use App\Models\OrderDetail;
use DB;

class OrderController extends Controller
{
    public function getList(){
    	$data['acclist'] = Order::where('id', '>',0)->orderBy('id','desc')->paginate(8);
    	$data['cateleft'] = 'order';
    	return view('backend.order',$data);
    }
    public function getDetail($id){
    	$data['order'] = Order::find($id);
    	$data['list'] =DB::table('orderdetail')
            ->join('price', 'price.id', '=', 'orderdetail.price_id')
            
            ->whereRaw('orderdetail.order_id = '.$id)
            
            ->paginate(8);
        // dd($data);
        $data['cateleft'] = 'order';
    	return view('backend.orderdetail',$data);
    }
    public function yesOrder($id){
    	$order = Order::find($id);
    	$order->status = 0;
    	$order->save();
    	return back();
    }
    public function noOrder($id){
    	$order = Order::find($id);
    	$order->status = -1;
    	$order->save();
    	return back();
    }
}
