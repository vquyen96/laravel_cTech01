<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Models\CateServer;
use App\Models\Price;
use DB;
class ServerController extends Controller
{
    public function getList(){
        $data['max']=0;
        $data['hostlist'] =DB::table('server')
            ->join('price', 'server.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 3')
            
            ->paginate(8);

    	// $data['hostlist'] = Server::where('id', '>',0)->paginate(8);
    	$data['catename'] = 'cateserver';
    	$data['cateleft'] = 'products';
    	return view('backend.server',$data);
    }
    public function getCate($id){
    	$data['max']=0;
        $data['hostlist'] =DB::table('server')
            ->join('price', 'server.id', '=', 'price.product_id')
            ->whereRaw('price.cate_id = 3 AND server.cate = '.$id)
            
            ->paginate(8);

    	$data['catename'] = 'cateserver';
        $data['cateleft'] = 'products';
    	return view('backend.server',$data);
    }
    public function getAdd(){
    	$data['catelist'] = CateServer::all();
        $data['catename'] = 'cateserver';
        $data['cateleft'] = 'products';
    	return view('backend.addserver', $data);
    }
    public function postAdd(Request $requests){
    	$server = new Server;
        $server->name = $requests->name;
        
        $server->cpu = $requests->cpu;
        $server->capacity = $requests->capacity;
        $server->user = $requests->user;
        $server->core = $requests->core;
        $server->hdd = $requests->hdd;
        $server->ram = $requests->ram;
        $server->ramfree = $requests->ramfree;
        $server->bandwidth = $requests->bandwidth;
        $server->speed = $requests->speed;
        $server->ip = $requests->ip;
        $server->species = $requests->species;
        $server->cate = $requests->cate;
        $server->save();

        $price = new Price;
        $price->time = 'OneTime';
        $price->price = $requests->price;
        $price->old_price = '0';
        $price->cate_id = 3;
        $price->product_id = $server->id;
        $price->save();

    	return redirect('admin/products/server');
    	
    }
    public function getEdit($id){
    	$data['server'] = Server::find($id);
        $data['price'] = Price::whereRaw('cate_id = 3 AND product_id = '.$id)->paginate(8);
    	$data['catename'] = 'cateserver';
        $data['cateleft'] = 'products';
    	$data['catelist'] = CateServer::all();
    	return view('backend.editserver',$data);
    }
    public function postEdit(Request $requests, $id){
    	$server = Server::find($id);
    	$server->name = $requests->name;
        
        $server->cpu = $requests->cpu;
        $server->capacity = $requests->capacity;
        $server->user = $requests->user;
        $server->core = $requests->core;
        $server->hdd = $requests->hdd;
        $server->ram = $requests->ram;
        $server->ramfree = $requests->ramfree;
        $server->bandwidth = $requests->bandwidth;
        $server->speed = $requests->speed;
        $server->ip = $requests->ip;
        $server->species = $requests->species;
        $server->cate = $requests->cate;
        $server->save();
    	return redirect('admin/products/server');
    }
    public function deleteCate($id){
    	Server::destroy($id);
    	return back();
    }
}
