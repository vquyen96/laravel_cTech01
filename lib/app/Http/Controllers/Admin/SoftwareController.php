<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Software;
use App\Models\CateSoft;
use App\Models\Price;
use DB;
class SoftwareController extends Controller
{
    public function getList(){
    	$data['max']=0;
        $data['hostlist'] =DB::table('software')
            ->join('price', 'software.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 5')
            ->paginate(8);
    	$data['catename'] = 'catesoft';
    	$data['cateleft'] = 'products';
    	return view('backend.software',$data);
    }
    public function getCate($id){
        $data['max']=0;
        $data['hostlist'] =DB::table('software')
            ->join('price', 'software.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 5 AND software.cate = '.$id)
            ->paginate(8);
        $data['catename'] = 'catesoft';
        $data['cateleft'] = 'products';
        return view('backend.server',$data);
    }
    public function getAdd(){
        $data['catelist'] = CateSoft::all();
        $data['catename'] = 'catesoft';
        $data['cateleft'] = 'products';
    	return view('backend.addsoftware', $data);
    }
    public function postAdd(Request $requests){
    	$software = new Software;
        $software->name = $requests->name;
        $software->capacity = $requests->capacity;
        $software->num_of_backup = $requests->num_of_backup;
        $software->backup_calendar = $requests->backup_calendar;
        $software->data_center = $requests->data_center;
        $software->species = $requests->species;
        $software->cate = $requests->cate;

        $software->save();

        $price = new Price;
        $price->time = $requests->time;
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 5;
        $price->product_id = $software->id;
        $price->save();
    	return redirect('admin/products/software');
    	
    }
    public function getEdit($id){
    	$data['soft'] = Software::find($id);
        $data['price'] = Price::whereRaw('cate_id = 5 AND product_id = '.$id)->paginate(8);
        $data['catelist'] = CateSoft::all();
    	$data['catename'] = 'catesoft';
        $data['cateleft'] = 'products';
    	return view('backend.editsoftware',$data);
    }
    public function postEdit(Request $requests, $id){
    	$software = Software::find($id);
    	$software->name = $requests->name;
        $software->capacity = $requests->capacity;
        $software->num_of_backup = $requests->num_of_backup;
        $software->backup_calendar = $requests->backup_calendar;
        $software->data_center = $requests->data_center;
        $software->species = $requests->species;
        $software->cate = $requests->cate;

        $software->save();
    	return redirect('admin/products/software');
    }
    public function deleteCate($id){
    	Software::destroy($id);
    	return back();
    }
}
