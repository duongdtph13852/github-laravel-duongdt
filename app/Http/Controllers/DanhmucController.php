<?php

namespace App\Http\Controllers;

use App\Models\Danhmuc;
use Illuminate\Http\Request;

class DanhmucController extends Controller
{
    //
    private $v;
    public function __construct(){
        $this->v =[];
    }
    public function listDanhmuc(){
        $danhhmuc = new Danhmuc();
        $this->v['listdm'] = $danhhmuc->LoadDanhmuc();
        return view('danhmuc.danhmuc',$this->v);
    }
}
