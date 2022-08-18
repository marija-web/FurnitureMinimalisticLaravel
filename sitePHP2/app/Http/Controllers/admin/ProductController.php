<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\AdminProductRequest;
use App\Models\Categories;
use App\Models\Prices;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class ProductController extends MainController
{
    public function index()
    {
        $this->data['products'] = Products::with(['category', 'price'])
            ->where("main", "=", "0")
            ->get();
        $this->data["categories"] = Categories::all();

        return view("pages.admin.product", $this->data);
    }

    public function put(AdminProductRequest $request){
        $id=$request->hiddenId;
        $product=Products::where("id","=",$id)->first();
        $price=Prices::where("products_id","=",$id)->first();

        if($request->fileProducts != null){
            $name=$request->fileProducts->getClientOriginalName();
            $nameArray=explode(".",$name);
            $src=$nameArray[0].time().".".$nameArray[1];
        }
        else{
            $src=$product->image;
        }

        try {
            DB::beginTransaction();
            $product->name = $request->nameProducts;
            $product->image = $src;
            $product->description = $request->descriptionProducts;
            $product->categories_id = $request->catProducts;
            $product->save();

            if($product->save()){
                $price->price=$request->priceProducts;
                $price->save();
            }

            if($request->fileProducts != null){
                $request->fileProducts->move(public_path("asset/images/gallery"), $src);
            }

            DB::commit();

            if ($product->save() && $price->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->nameProducts)." row has been updated!"
                ]);
            }

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $e->getMessage()]);
        }

    }

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $product=Products::find($id);
            $productImg=Products::find($id)->image;
            $price=Prices::where("products_id","=",$id)->first();
            $product->delete();
            File::delete("asset/images/gallery/".$productImg);

            if($product->delete()){
                $price->delete();
            }

            DB::commit();

            if($product->delete() && $price->delete()){
                return redirect()->back()->with([
                    "msg" =>  "Deleting was successful!"
                ]);
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }

    public function store(AdminProductRequest $request){


            if($request->fileProducts !=null){
                $name=$request->fileProducts->getClientOriginalName();
                $nameArray=explode(".",$name);
                $src=$nameArray[0].time().".".$nameArray[1];
            }
            else{
                return redirect()->back()->with([
                    "msgerror" => "The file products field is required."
                ]);
            }

            if($request->catProducts == 0){
                return redirect()->back()->with([
                    "msgerror" => "Category must be chosen."
                ]);
            }

        try{
            DB::beginTransaction();
            $insertProduct=Products::create([
                "name"=>$request->nameProducts,
                "image"=>$src,
                "description"=>$request->descriptionProducts,
                "main"=>"0",
                "categories_id"=>$request->catProducts,
            ])->id;

            if($insertProduct){
                $insertPrice=Prices::create([
                    "price"=>$request->priceProducts,
                    "products_id"=>$insertProduct
                ]);
            }


            $request->fileProducts->move(public_path("asset/images/gallery"), $src);

            DB::commit();

            if($insertProduct && $insertPrice){
                return redirect()->back()->with([
                    "msg" => "Inserting ".$request->nameProducts." product was successful!"
                ]);
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            dd($exception->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }

}
