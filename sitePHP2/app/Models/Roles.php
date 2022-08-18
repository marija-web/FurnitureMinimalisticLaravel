<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Roles extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="roles";
    protected $fillable=["role", "created_at", "updated_at", "deleted_at"];

    public function user(){
        return $this->hasMany(Users::class);
    }
}
