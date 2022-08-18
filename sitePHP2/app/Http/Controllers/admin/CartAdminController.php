<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Prices;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CartAdminController extends MainController
{
    public function index(){

        $this->data["carts"]=Cart::with(["user", "order"])
            ->get();

        $this->data["orders"]=Order::with(["product"])
            ->get();

        $this->data["prices"]=Prices::with(['product'])
            ->get();


        return view("pages.admin.cart", $this->data);
    }

    public function cartFilter(Request $request){
        $valueDate=$request->valueDate;

        try{
            DB::beginTransaction();
            $carts=Cart::with(['user', 'order'])
                ->where("created_at","LIKE", "$valueDate%")
                ->get();

            $orders=Order::with(['product'])
                ->get();

            $prices=Prices::with(['product'])
                ->get();

            DB::commit();

            if($carts){
                return json_encode([
                    "carts"=>$carts,
                    "orders"=>$orders,
                    "prices"=>$prices
                ]);
            }
        }
        catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }
}
