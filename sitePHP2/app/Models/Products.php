<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use HasFactory, SoftDeletes;
    protected $table="products";
    protected $fillable=["name", "image", "description", "main", "categories_id", "created_at", "updated_at", "deleted_at"];

    public function category(){
        return $this->belongsTo(Categories::class, "categories_id", "id");
    }

    public function price(){
        return $this->hasMany(Prices::class);
    }

    public function order(){
        return $this->hasMany(Order::class);
    }
}
