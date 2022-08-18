<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\Users;
use App\Models\UsersActivity;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends MainController
{
    public function index(){
        return view("pages.auth.register",  $this->data);
    }

    public function register(RegisterRequest $request){

        try{
            DB::beginTransaction();
            $registered=Users::create([
                "firstName"=>ucfirst($request->firstName),
                "lastName"=>ucfirst($request->lastName),
                "email"=>$request->email,
                "roles_id"=>2,
                "password"=>md5($request->password)
            ])->id;

            DB::commit();

            if($registered){
                return redirect()->back()->with([
                    "msg" => "You have been registered!"
                ]);
            }

            else{
                return redirect("/registerForm");
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            return view("pages.main.error", ["errorId" => $exception->getMessage()]);
        }

    }
}
