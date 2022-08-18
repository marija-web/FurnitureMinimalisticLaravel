<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\admin\MainController;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserController extends MainController
{
    public function index()
    {
        $this->data['users'] = Users::all();
        $this->data['roles'] = Roles::all();

        return view("pages.admin.user", $this->data);
    }

    public function put(Request $request)
    {
        $id = $request->hiddenId;
        $role = $request->roleUser;
        $user = Users::where("id", "=", $id)->first();

        try {
            DB::beginTransaction();
            $user->roles_id = $role;
            $user->save();

            DB::commit();

            if ($user->save()) {
                return redirect()->back()->with([
                    "msg" => "Role has been updated for " . $user->firstName . " " . $user->lastName
                ]);
            }

        }
        catch (\Exception $e) {
            DB::rollBack();
            $guid = uniqid();
            Log::error($guid . " " . $e->getMessage());
            return view("pages.main.error", ["errorId" => $guid]);
        }

    }

    public function delete(Request $request)
    {
        $id = $request->hiddenId;

        try {
            DB::beginTransaction();
            $user = Users::find($id);
            $user->delete();

            DB::commit();

            if ($user->delete()) {
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
