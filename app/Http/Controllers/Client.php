<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Client extends Controller
{
    //
    public function viewCL(){
        return view('client.index');
    }
}
