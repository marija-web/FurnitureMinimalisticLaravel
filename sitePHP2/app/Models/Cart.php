<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="carts";
    protected $fillable=["user_id", "created_at", "updated_at", "deleted_at"];

    public function user(){
        return $this->belongsTo(Users::class, "user_id", "id");
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
