<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="messages";
    protected $fillable=["message", "users_id", "created_at", "updated_at", "deleted_at"];

    public function user(){
        return $this->belongsTo(Users::class, "users_id", "id");
    }
}
