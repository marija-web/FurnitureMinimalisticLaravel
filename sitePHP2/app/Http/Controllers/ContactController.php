<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Message;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\MyMail;

class ContactController extends MainController
{
    public function index(){
        $this->data["messages"]=Message::with(['user'])
            ->get();
        return view("pages.main.contact",  $this->data);
    }

    public function store(ContactRequest $request){
        $message=$request->message;
        $id=$request->idUser;

        try{
            DB::beginTransaction();
            $messageInsert=Message::create([
                "message"=>$message,
                "users_id"=>$id
            ]);

            $user=DB::table("users")
                ->where("id", "=", $id)
                ->first();

            DB::commit();

            if($messageInsert){
                $details = [
                    'message' => $message,
                    'user' => $user->email
                ];

                Mail::to('marija.vucicevic.18.19@ict.edu.rs')->send(new MyMail($details));

                return redirect()->back()->with([
                    "msg" => "Your message has been sent to our administrators email. Thank you!"
                ]);
            }
            else{
                return redirect("/contactForm");
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
