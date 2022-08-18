<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MessageController extends MainController
{
    public function index(){

        $this->data['messages']=Message::with(['user'])->get();

        return view("pages.admin.message", $this->data);

    }

    public function delete(Request $request)
    {
        $id = $request->hiddenId;

        try {
            DB::beginTransaction();
            $message = Message::find($id);
            $message->delete();

            DB::commit();

            if ($message->delete()) {
                return redirect()->back()->with([
                    "msg" => "Deleting was successful!"
                ]);
            }
        } catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }
    }

}
