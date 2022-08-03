<?php

namespace App\Http\Controllers;

use App\Models\Khuyenmai;
use App\Models\Sanpham;
use Illuminate\Http\Request;

class KhuyenmaiController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v =[];
    }
    public function listSell(){
        $khuyenmai = new Khuyenmai();
        $sanpham = new Sanpham();
        $this->v['listkm'] = $khuyenmai->loadListKM();
        $this->v['listsp'] = $sanpham->loadListSanpham();
        return view('khuyenmai.khuyenmai', $this->v);
    }
}
