<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Hoadon extends Model
{
    use HasFactory;
    protected $table = "hoa_dons";
    protected $fillable = ['id','name','dia_chi','sdt','tong_tien','id_user','trang_thai'];
    public function loadListHoadon($params = []){
        $query = DB::table($this->table)->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
}
