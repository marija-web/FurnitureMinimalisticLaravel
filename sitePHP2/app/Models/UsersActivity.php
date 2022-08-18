<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsersActivity extends Model
{
    use HasFactory;

    protected $table="users_activities";
    protected $fillable=["users_id", "dateLogin", "dateLoggingOut","created_at", "updated_at"];

    public function  user(){
        return $this->belongsTo(Users::class, "users_id", "id");
    }
}
