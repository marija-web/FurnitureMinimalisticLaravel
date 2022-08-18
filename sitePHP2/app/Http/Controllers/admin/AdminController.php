<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Http\Requests\updateAdminRequest;
use App\Models\Products;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminController extends MainController
{
    public function index(){

        $this->data['admin']=Users::with(['role'])
            ->where("roles_id","=","1")
            ->first();

        return view("pages.admin.admin", $this->data);
    }

    public function put(UpdateAdminRequest $request){

            $user = Users::where("roles_id","=", "1")->first();
            $firstName = $request->input("firstName");
            $lastName = $request->input("lastName");
            $email = $request->input("email");

            try {
                DB::beginTransaction();
                $user->firstName = $firstName;
                $user->lastName = $lastName;
                $user->email = $email;
                $user->save();

                DB::commit();

                if ($user->save()) {
                    session()->put("user", $user);
                    return json_encode("Your account has been updated!");
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
