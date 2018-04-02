<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Price;
use App\Models\Hosting;
use App\Models\Email;
use App\Models\Sever;
use App\Models\Ads;
use App\Models\Software;
use App\Models\Design;
use App\Models\Bonus;

use App\Models\Order;
use App\Models\OrderDetail;
use Cart;
class CartController extends Controller
{
    public function getAddCart($id){

    	$price = Price::find($id);
    	switch ($price->cate_id) {
    		case 1:
    			$product = Hosting::find($price->product_id);
    			break;
    		case 2:
    			$product = Email::find($price->product_id);
    			break;
    		case 3:
    			$product = Sever::find($price->product_id);
    			break;
    		case 4:
    			$product = Ads::find($price->product_id);
    			break;
    		case 5:
    			$product = Software::find($price->product_id);
    			break;
    		case 6:
    			$product = Design::find($price->product_id);
    			break;
    		case 7:
    			$product = Bonus::find($price->product_id);
    			break;
    		
    		default:
    			# code...
    			break;
    	};
    	Cart::add(['id'=>$id, 'name'=>$product->name, 'qty'=>1, 'price'=>$price->price, 'options'=>['time'=>$price->time]]);

    	return redirect('cart/show');
    }
    public function getShowCart(){
    	// Cart::destroy();
        // dd(Cart::content());
        $data['cateleft'] = 'order';
    	$data['total'] = Cart::total();
    	$data['items'] = Cart::content();
    	return view('frontend.cart', $data);
    }
    public function getDeleteCart($id){
    	if($id == 'all'){
    		Cart::destroy();
    	}
    	else{
    		Cart::remove($id);
    	}
    	return back();
    }
    public function getUpdateCart(Request $request){
    	Cart::update($request->rowId, $request->qty);

    }
    public function postComplete(Request $request){
    	$order = new Order;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->mst = $request->mst;
        $order->cmnd = $request->cmnd;
        $order->adress = $request->adress;
        $order->phone = $request->phone;
        $order->gender = $request->gender;
        $order->couselor = $request->couselor;
        $order->note = $request->note;
        $order->type = $request->type;
        $order->status = 1;
        $order->total_price = Cart::total();
        // dd($order);
        $order->save();
    	$data['cart'] = Cart::content();
    	$data['total'] = Cart::total();
    	sleep(2);
    	$order_id = $order->id;

        foreach ($data['cart'] as $item) {
        	$orderdetail = new OrderDetail;
        	$orderdetail->name = $item->name;
	        $orderdetail->qty = $item->qty;
	        $orderdetail->price_id = $item->id;
	        $orderdetail->order_id = $order->id;
	        $orderdetail->save();
        }
    	Cart::destroy();
    	
    	return redirect('cart/complete');
    }
    public function getComplete(){
    	$data['cateleft'] = 'order';
    	return view('frontend.complete',$data);
    }
}
