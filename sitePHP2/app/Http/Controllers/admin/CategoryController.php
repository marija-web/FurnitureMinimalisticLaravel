<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\AdminCategoryRequest;
use App\Http\Requests\AdminMenuRequest;
use App\Models\Categories;
use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CategoryController extends MainController
{
    public function index(){

        $this->data["categories"]=Categories::all();

        return view("pages.admin.category", $this->data);
    }

    public function put(AdminCategoryRequest $request){
        $id=$request->hiddenId;
        $category=Categories::where("id","=",$id)->first();

        try {
            DB::beginTransaction();
            $category->name = $request->nameCategory;
            $category->save();

            DB::commit();

            if ($category->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->nameCategory)." row has been updated!"
                ]);
            }

        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("error", ["errorId" => $guid]);
        }

    }

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $category=Categories::find($id);
            $category->delete();

            DB::commit();

            if($category->delete()){
                return redirect()->back()->with([
                    "msg" =>  "Deleting was successful!"
                ]);
            }
        }
        catch (\Exception $e){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $e->getMessage());
            return view("error", ["errorId" => $guid]);
        }

    }

    public function store(AdminCategoryRequest $request){

        try{
            DB::beginTransaction();
            $insertCategory=Categories::create([
                "name"=>$request->nameCategory
            ]);

            DB::commit();

            if($insertCategory){
                return redirect()->back()->with([
                    "msg" => "Inserting ".$request->nameCategory." category was successful!"
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
