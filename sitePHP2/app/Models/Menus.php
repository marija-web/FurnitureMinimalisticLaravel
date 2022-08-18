<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="menuses";
    protected $fillable=["name", "route","order", "priority", "created_at", "updated_at", "deleted_at"];
}
