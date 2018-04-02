<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bonus;
use App\Models\Price;
use DB;
class BonusController extends Controller
{
    public function getList(){
    	$data['max'] = 0;
        $data['hostlist'] =DB::table('bonus')
            ->join('price', 'bonus.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 7')
            ->paginate(8);
    	$data['catename'] = 'bonus';
    	$data['cateleft'] = 'products';
    	return view('backend.bonus',$data);
    }
    public function getAdd(){
        $data['catename'] = 'bonus';
        $data['cateleft'] = 'products';
    	return view('backend.addbonus', $data);
    }
    public function postAdd(Request $requests){
    	$bonus = new Bonus;
        $bonus->name = $requests->name;
        
        $bonus->cate = $requests->cate;
        $bonus->save();

        $price = new Price;
        $price->time = $requests->time;
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 7;
        $price->product_id = $bonus->id;
        $price->save();

    	return redirect('admin/products/bonus');
    	
    }
    public function getEdit($id){
    	$data['bonus'] = Bonus::find($id);
        $data['price'] = Price::whereRaw('cate_id = 7 AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'bonus';
        $data['cateleft'] = 'products';
    	return view('backend.editbonus',$data);
    }
    public function postEdit(Request $requests, $id){
    	$bonus = Bonus::find($id);
    	$bonus->name = $requests->name;
        $bonus->price = $requests->price;
        $bonus->time = $requests->time;
        $bonus->cate = $requests->cate;
        $bonus->save();
    	return redirect('admin/products/bonus');
    }
    public function deleteCate($id){
    	Bonus::destroy($id);
    	return back();
    }
}
