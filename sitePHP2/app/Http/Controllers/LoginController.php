<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\UsersActivity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class LoginController extends MainController
{
    public function index(){
        return view("pages.auth.login", $this->data);
    }

    public function login(LoginRequest $request){
        $email=$request->email;
        $password=$request->password;

        try{
            DB::beginTransaction();

            $user=DB::table("users")
                ->where("email","=", $email)
                ->where("password", "=", md5($password))
                ->first();

            $userId=DB::table("users")
                ->where("email","=", $email)
                ->where("password", "=", md5($password))
                ->first()->id;

            DB::commit();

            if($user){
                session()->put("user", $user);
                $currentDate= date("Y-m-d");

                $activity=UsersActivity::create([
                    "users_id"=>$userId,
                    "dateLogin"=>$currentDate
                ]);

                return redirect("/products");
            }
            else{
                return redirect()->back()->with([
                    "msg" => "Check your email or password!"
                ]);
            }
        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            return view("error", ["errorId" => $guid]);
        }
    }

    public function logout(){
        $userId=session()->get("user")->id;
        $currentDate= date("Y-m-d");

        try{
            DB::beginTransaction();;
            $activity=UsersActivity::create([
                "users_id"=>$userId,
                "dateLoggingOut"=>$currentDate
            ]);

            DB::commit();

            session()->forget("user");
            return redirect("/");
        }
        catch(\Exception $exception){
            DB::rollBack();
            $guid = uniqid();
            Log::error( $guid . " " . $exception->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }
}
