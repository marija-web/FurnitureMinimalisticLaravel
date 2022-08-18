<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public $data;

    public function __construct(){
        $this->data["menuAdmin"]=[[
            "link"=>"/adminPanel",
            "icon"=>"nc-circle-10",
            "name"=>"Admins profile"
        ],
        [
            "link"=>"/adminPanel/activity",
            "icon"=>"nc-tap-01",
            "name"=>"Users activity"
        ],
        [
            "link"=>"/adminPanel/cart",
            "icon"=>"nc-cart-simple",
            "name"=>"Cart activity"
        ],
        [
            "link"=>"/adminPanel/message",
            "icon"=>"nc-email-85",
            "name"=>"Messages Table"
        ],
        [
            "link"=>"/adminPanel/menu",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Menus Table"
        ],
        [
            "link"=>"/adminPanel/category",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Categories Table"
        ],
        [
            "link"=>"/adminPanel/user",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Users Table"
        ],
        [
            "link"=>"/adminPanel/role",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Roles Table"
        ],
        [
            "link"=>"/adminPanel/product",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Products Table"
        ],
        [
            "link"=>"/adminPanel/mainProduct",
            "icon"=>"nc-bullet-list-67",
            "name"=>"Main products Table"
        ],
        [
            "link"=>"/",
            "icon"=>"nc-spaceship",
            "name"=>"Go back to site"
        ]];
    }

}
