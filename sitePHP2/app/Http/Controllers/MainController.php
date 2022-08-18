<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use App\Models\Menus;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public $data;

    public function __construct(){

        $this->data['menusA']=DB::table("menuses")
            ->where("priority", '=', '1')
            ->orWhere("priority", '=', '2')
            ->orWhere("priority", '=', '3')
            ->orderBy("order")
            ->get();

        $this->data['menusU']=DB::table("menuses")
            ->where("priority", "=", "1")
            ->orWhere("priority", "=", "2")
            ->orderBy("order")->get();

        $this->data['menusO']=DB::table("menuses")
            ->where("priority", "=", "1")
            ->orWhere("priority", "=", "0")
            ->orderBy("order")->get();
    }
}
