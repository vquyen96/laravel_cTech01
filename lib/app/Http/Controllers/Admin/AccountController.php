<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Http\Requests\AddAccountRequest;
use App\Http\Requests\EditAccountRequest;
use Auth;
class AccountController extends Controller
{
    public function getList(){
        $email = Auth::user()->email;
        $data['users'] = Account::where('email', $email)->paginate(1);
        $data['user'] = $data['users'][0];

    	$data['acclist'] = Account::where('id', '>',0)->paginate(8);
    	$data['cateleft'] = 'account';
    	return view('backend.accounts',$data);
    }
    public function getAdd(){
        $email = Auth::user()->email;
        $data['users'] = Account::where('email', $email)->paginate(1);
        $data['user'] = $data['users'][0];

        $data['cateleft'] = 'account';
    	return view('backend.addaccount',$data);
    }
    public function postAdd(AddAccountRequest $requests){
    	$account = new Account;
    	$account->email = $requests->email;
    	$account->password = bcrypt($requests->password);
        $account->level = $requests->level;
    	$account->save();
    	return redirect('admin/account');
    	
    }
    public function getEdit($id){
        $email = Auth::user()->email;
        $data['users'] = Account::where('email', $email)->paginate(1);
        $data['user'] = $data['users'][0];
        
    	$data['account'] = Account::find($id);
    	$data['cateleft'] = 'account';
    	return view('backend.editaccount',$data);
    }
    public function postEdit(EditAccountRequest $requests, $id){
    	$account = Account::find($id);
    	$account->email = $requests->email;
    	$account->password = bcrypt($requests->password);
        $account->level = $requests->level;
    	$account->save();
    	return redirect('admin/account');
    }
    public function getDelete($id){
    	Account::destroy($id);
    	return back();
    }
}
