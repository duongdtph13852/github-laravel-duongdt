<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSanphamRequest;
use App\Models\Sanpham;
use App\Models\Danhmuc;
use Illuminate\Http\Request;
use Illuminate\Database\Console\DbCommand;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Session;

class SanphamController extends Controller
{   
    //
    private $v;
    public function __construct(){
        $this->v =[];       
    }
    public function ListSanpham(){  
       $sanpham = new Sanpham();   
       $danhmuc = new Danhmuc();    
       $this->v['listsp'] = $sanpham->loadListSanpham();
       $this->v['listdm'] = $danhmuc->LoadDanhmuc();
    return view('sanpham.sanpham', $this->v);
    }
    public function addSp(AddSanphamRequest $request){
        $danhmuc = new Danhmuc();   
        $this->v['listdm'] = $danhmuc->LoadDanhmuc();
        $method_route = 'route_BackEnd_Sanpham_Add';
        if ($request->isMethod('post')){;
            $params = [];
            $params['cols'] = $request->post();
            //dd ($request->post());
            unset($params['cols']['_token']);
            if($request->hasFile('cmt_mat_truoc')&& $request->file('cmt_mat_truoc')->isValid()){
                $params['cols']['hinh']= $this->uploadImg($request->file('cmt_mat_truoc'));
            }
            // dd ( $params['cols']);
            $modelTest = new Sanpham();
            $res = $modelTest->saveNewSp($params);
            if($res == null){
                return redirect()->route('$method_router');
            } elseif($res > 0){
                Session::flash('success','them moi thanh cong');
                return redirect('/sanpham');
            } else{
                Session::flash('error','loi!');
                return redirect()->route('$method_route');
            }
        }
        return view('sanpham.add',$this->v);
    }
    public function  detail($prod_id){
        $danhmuc = new Danhmuc();   
        $this->v['listdm'] = $danhmuc->LoadDanhmuc();
        $tests = new Sanpham();
        $objItem = $tests->loadOne($prod_id);
        //dd($objItem);
        $this->v['objItem'] = $objItem;
        $this->v['_title'] = "chi tiết người dùng";
        return view('sanpham.detail',$this->v);
    }
    public function update($prod_id,Request $request){
        $method_route = "route_BackEnd_Sanpham_Detail";
        $params = [];
        $params['cols'] = $request->post();
        unset($params['cols']['_token']);
        $sanpham= new Sanpham();
        $objItem = $sanpham->loadOne($prod_id);
        $params['cols']['prod_id'] = $prod_id;
        if(!is_null($params['cols'])){
            $params['cols'];
        }
        $res = $sanpham->saveUpdate($params);
        // dd($res);
        if($res == null){
            return redirect()->route($method_route,['prod_id'=>$prod_id]);
        }else if($res == 1){
            Session::flash('success','cap nhat ban ghi'. $objItem->prod_id .'thanh cong');
            return redirect('/sanpham');
        }else{
            Session::flash('error','loi ban ghi'.$objItem->prod_id);
            return redirect()->route($method_route,['prod_id'=>$prod_id]);
        }
    }
    public function delete($prod_id){
       $data = Sanpham::find($prod_id);
    //    dd($prod_id);
       $data->delete();
       return redirect('/sanpham');
    }
    public function uploadImg($file){
        $fileName = time().'_'.$file->getClientOriginalName();
        return $file->storeAs('cmd',$fileName,'public');
    }
}
