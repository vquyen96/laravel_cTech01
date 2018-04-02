<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Email;
use App\Models\CateEmail;
use App\Models\Price;
use DB;

class EmailController extends Controller
{
    public function getList(){
        $data['max']=0;
        $data['hostlist'] = DB::table('email')
                ->join('price', function($join)
                {
                $join->on('email.id', '=', 'price.product_id')
                ->where('price.cate_id', 2)
                ->select('email.id', 'email.name', 'email.capacity', 'email.email_address','price.price', 'price.time');
                })
                ->paginate(8);
    	// $data['hostlist'] = Email::where('id', '>',0)->paginate(8);
    	$data['catename'] = 'cateemail';
    	$data['cateleft'] = 'products';
    	return view('backend.email',$data);
    }
    public function getCate($id){
        $data['max']=0;
        // dd($id);
        $data['hostlist'] =DB::table('email')
            ->join('price', 'email.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 2 AND email.cate = '.$id)
            
            ->paginate(8);

    	$data['catename'] = 'cateemail';
        $data['cateleft'] = 'products';
    	return view('backend.email',$data);
    }
    public function getAdd(){
    	$data['catelist'] = CateEmail::all();
        $data['catename'] = 'cateemail';
        $data['cateleft'] = 'products';
    	return view('backend.addemail', $data);
    }
    public function postAdd(Request $requests){
    	$email = new Email;
        $email->name = $requests->name;
        
        $email->capacity = $requests->capacity;
        $email->email_address = $requests->email_address;
        $email->emai_forwarder = $requests->emai_forwarder;
        $email->mail_list = $requests->mail_list;
        $email->park_domain = $requests->park_domain;
        $email->add_on_domain = $requests->add_on_domain;
        $email->private_ip = $requests->private_ip;
        $email->cate = $requests->cate;
        $email->save();

        $price = new Price;
        $price->time = 'OneTime';
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 2;
        $price->product_id = $email->id;
        $price->save();

    	return redirect('admin/products/email');
    	
    }
    public function getEdit($id){
    	$data['email'] = Email::find($id);
        $data['price'] = Price::whereRaw('cate_id = 2 AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'cateemail';
        $data['cateleft'] = 'products';
    	$data['catelist'] = CateEmail::all();
    	return view('backend.editEmail',$data);
    }
    public function postEdit(Request $requests, $id){
    	$email = Email::find($id);
    	$email->name = $requests->name;
    	
        $email->capacity = $requests->capacity;
        $email->email_address = $requests->email_address;
        $email->emai_forwarder = $requests->emai_forwarder;
        $email->mail_list = $requests->mail_list;
        $email->park_domain = $requests->park_domain;
        $email->add_on_domain = $requests->add_on_domain;
        $email->private_ip = $requests->private_ip;
        $email->cate = $requests->cate;
    	$email->save();
    	return redirect('admin/products/email');
    }
    public function deleteCate($id){
    	Email::destroy($id);
    	return back();
    }
}
