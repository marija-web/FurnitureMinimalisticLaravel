<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartController extends MainController
{
    public function index(){
        return view("pages.products.cart", $this->data);
    }

    public function store(Request $request){
        $idUsera=$request->input("data");

        try{
            DB::beginTransaction();
            $insertUser=Cart::create([
                "user_id"=>$idUsera
            ])->id;

            if($insertUser){
                for($i=0; $i<count($_POST)-1; $i++){
                    $quantity=$_POST['cart'.$i]['quantity'];
                    $idProducts=$_POST['cart'.$i]['id'];

                    $insertProduct=Order::create([
                       "quantity"=>$quantity,
                       "products_id"=>$idProducts,
                        "cart_id"=>$insertUser
                    ]);
                    DB::commit();
                }
            }
            if($insertProduct){
                return json_encode("Thank you for supporting us.");
            }
        }
        catch(\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("error", ["errorId" => $guid]);
        }
    }
}
