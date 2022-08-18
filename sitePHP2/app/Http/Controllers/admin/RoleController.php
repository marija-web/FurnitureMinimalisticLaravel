<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\AdminRoleRequest;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RoleController extends MainController
{
    public function index()
    {
        $this->data['roles']=Roles::all();

        return view("pages.admin.role", $this->data);
    }

    public function put(AdminRoleRequest $request){
        $id=$request->hiddenId;
        $role=Roles::where("id","=",$id)->first();

        try {
            DB::beginTransaction();
            $role->role = $request->nameRole;
            $role->save();

            DB::commit();

            if ($role->save()) {
                return redirect()->back()->with([
                    "msg" =>  ucfirst($request->nameRole)." row has been updated!"
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

    public function delete(Request $request){
        $id=$request->hiddenId;

        try {
            DB::beginTransaction();
            $role=Roles::find($id);
            $role->delete();

            DB::commit();

            if($role->delete()){
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

    public function store(AdminRoleRequest $request){

        try{
            DB::beginTransaction();
            $insertRole=Roles::create([
                "role"=>$request->nameRole
            ]);

            DB::commit();

            if($insertRole){
                return redirect()->back()->with([
                    "msg" => "Inserting ".$request->nameRole." category was successful!"
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
