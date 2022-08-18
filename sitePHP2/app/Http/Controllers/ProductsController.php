<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends MainController
{
    public function index($keyword=null){

        if($keyword!=null){
            $this->data['products']=Products::with(['category', 'price'])
                ->where("name", "LIKE", "%$keyword%")
                ->where("main","=","0")
                ->paginate(4);

        }
        else{
            $this->data['products']=Products::where("main","=","0")
                ->paginate(4);
        }
        return view("pages.products.index", $this->data);
    }

    public function show($id){
        $this->data["oneProduct"]=Products::with(['category', 'price'])
            ->where("main","=","0")
            ->where("id", "=", $id)
            ->first();

        return view("pages.products.showOne",  $this->data, ['description'=>true]);
    }

    public function search($keyword){

        $this->data['products']=Products::with(['category', 'price'])
            ->where("name", "LIKE", "%$keyword%")
            ->paginate(4);

        return json_encode($this->data['products']);

    }

    public function get(){
        $this->data['products']=Products::with(['category', 'price'])
            ->where("main","=","0")
            ->get();
        return json_encode($this->data['products']);
    }
}
