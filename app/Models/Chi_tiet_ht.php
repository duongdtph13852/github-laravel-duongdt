<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Chi_tiet_ht extends Model
{
    use HasFactory;
    protected $table = "chi_tiet_hoa_don";
    protected $fillable = ['id','name','id_san_pham','price','id_user','id_tong','so_luong'];
    public function loadListCtHoadon($params = []){
        $query = DB::table($this->table)->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
}
