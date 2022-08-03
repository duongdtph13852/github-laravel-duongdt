<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Danhmuc extends Model
{
    use HasFactory;
    protected $table = "danh_mucs";
    protected $fillable = ['cate_id','name_cate'];
    public function LoadDanhmuc($params = []){
        $query = DB::table($this->table)->select($this->fillable);
        // dd($query);
        $lists = $query->paginate(10);
        return $lists;
    }
   
}
