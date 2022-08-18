<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\AdminMenuRequest;
use App\Models\Menus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MenuController extends MainController
{
    public function index(){

        $this->data["menu"]=Menus::all();

        return view("pages.admin.menu", $this->data);
    }

    public function put(AdminMenuRequest $request){
        $id=$request->hiddenId;
        $menu=Menus::where("id","=",$id)->first();

        try {
            DB::beginTransaction();
            $menu->name = $request->nameMenu;
            $menu->route = $request->routeMenu;
            $menu->order = $request->orderMenu;
            $menu->priority = $request->priorityMenu;
            $menu->save();

            DB::commit();

            if ($menu->save()) {
                return redirect()->back()->with([
                    "msg" =>  $request->nameMenu." row has been updated!"
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
            $menu=Menus::find($id);
            $menu->delete();

            DB::commit();

            if($menu->delete()){
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
}
