<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v =[];
    }
    public function listUser(){
        $user = new Users();
        $this->v['list'] = $user->loadListWithPager();
        return view('user.index', $this->v);
    }
    public function add(UserRequest $request){  
        $method_route = 'route_BackEnd_User_Add';
        if ($request->isMethod('post')){;
            $params = [];
            $params['cols'] = $request->post();
            //dd ($request->post());
            unset($params['cols']['_token']);
            // dd ( $params['cols']);
            $modelTest = new Users();
            $res = $modelTest->saveNew($params);
            if($res == null){
                return redirect()->route('$method_router');
            } elseif($res > 0){
                Session::flash('success','them moi thanh cong');
                return redirect('/user');
            } else{
                Session::flash('error','loi!');
                return redirect()->route('$method_route');
            }
        }
        return view('user.add',$this->v);
    }
}
