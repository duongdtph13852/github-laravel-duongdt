<?php

namespace App\Http\Controllers;

use App\Models\Hoadon;
use App\Models\Users;
use Illuminate\Http\Request;

class HoadonController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v =[];
    }
    public function listHoadon(){
        $hoadon = new Hoadon();
        $user = new Users();
        $this->v['listhd'] = $hoadon->loadListHoadon();
        $this->v['list'] = $user->loadListWithPager();
        return view('hoadon.hoadon',$this->v);
    }
}
