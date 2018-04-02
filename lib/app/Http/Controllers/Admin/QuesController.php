<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ques;
class QuesController extends Controller
{
    public function getList(){
    	$data['ques'] = Ques::where('id', '>',0)->paginate(8);
    	$data['cateleft'] = 'ques';
    	return view('backend.ques',$data);
    }
    public function getAdd(){
        $data['catename'] = 'ques';
        $data['cateleft'] = 'ques';
    	return view('backend.addques', $data);
    }
    public function postAdd(Request $request){
    	$ques = new Ques;
    	$ques->ques = $request->ques;
    	$ques->ans = $request->ans;
    	$ques->save();
    	return redirect('admin/ques');
    	
    }
    public function getEdit($id){
    	$data['ques'] = Ques::find($id);
        $data['cateleft'] = 'ques';
    	return view('backend.editques',$data);
    }

    public function postEdit(Request $request, $id){
    	$ques = Ques::find($id);
    	$ques->ques = $request->ques;
    	$ques->ans = $request->ans;
    	$ques->save();
    	return redirect('admin/ques');
    }

    public function deleteCate($id){
    	Ques::destroy($id);
    	return back();
    }
}
