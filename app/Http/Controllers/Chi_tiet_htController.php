<?php

namespace App\Http\Controllers;

use App\Models\Chi_tiet_ht;
use App\Models\Users;
use App\Models\Sanpham;
use App\Models\Hoadon;
use Illuminate\Http\Request;

class Chi_tiet_htController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v =[];
    }
    public function chiTietHt(){
        $chi_tiet = new Chi_tiet_ht();
        $user = new Users();
        $sanpham = new Sanpham();
        $hoadon = new Hoadon();
        $this->v['listct'] = $chi_tiet->loadListCtHoadon();
        $this->v['listsp'] = $sanpham->loadListSanpham();
        $this->v['list'] = $user->loadListWithPager();
        $this->v['listhd'] = $hoadon->loadListHoadon();
        return view('ct_ht.ct_ht',$this->v);
    }
}
