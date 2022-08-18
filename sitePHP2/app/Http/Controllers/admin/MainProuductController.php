<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\AdminMainProductRequest;
use App\Models\Products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MainProuductController extends MainController
{
    public function index(){
        $this->data['mainProducts'] = Products::with(['category', 'price'])
            ->where("main", "=", "1")
            ->get();

        return view("pages.admin.mainProduct", $this->data);
    }

    public function put(AdminMainProductRequest $request){
        $id=$request->hiddenId;
        $product=Products::where("id","=",$id)->first();

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
            $product->image = $src;
            $product->description = $request->descriptionProducts;
            $product->save();

            if($request->fileProducts != null){
                $request->fileProducts->move(public_path("asset/images/main"), $src);
            }

            DB::commit();

            if ($product->save()) {
                return redirect()->back()->with([
                    "msg" =>  "This row has been updated!"
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


}
