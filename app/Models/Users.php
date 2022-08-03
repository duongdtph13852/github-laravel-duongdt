<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Users extends Model
{
    use HasFactory;
    protected $table = "users"; 
    protected $fillable = ['id','name','email','password'];
    public function loadListWithPager($params = []){
        $query = DB::table($this->table)->select($this->fillable);
        $lists = $query->paginate(10);
        return $lists;
    }
    public function saveNew($param){
        $data = array_merge($param['cols'],['password'=>Hash::make($param['cols']['password']) ]);
        $res=DB::table($this->table)->insertGetId($data);
        return $res;
    }
}
