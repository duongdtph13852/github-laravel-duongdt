<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Khuyenmai extends Model
{
    use HasFactory;
    protected $table = "khuyen_mais";
    protected $fillable = ['id','ma_kh','id_sanpham','so_luong'];
    public function loadListKM($params = []){
        $query = DB::table($this->table)->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
}
}