<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Users;

class HomeController extends MainController
{
    public function index(){

        $this->data["productsMain"]=Products::with(['category'])
            ->where("main","=","1")
            ->get();

        return view("pages.main.index", $this->data);
    }
}
