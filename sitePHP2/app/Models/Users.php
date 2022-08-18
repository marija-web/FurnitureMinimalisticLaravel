<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="users";
    protected $fillable=["firstName", "lastName", "email", "email_verified_at", "roles_id", "password", "remember_token", "created_at", "updated_at", "deleted_at"];

    public function message(){
        return $this->hasMany(Messages::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function  role(){
        return $this->belongsTo(Roles::class, "roles_id", "id");
    }

    public function  activity(){
        return $this->hasMany(UsersActivity::class);
    }
}
