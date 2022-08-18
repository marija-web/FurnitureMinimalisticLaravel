<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    protected $table="orders";
    protected $fillable=["quantity", "products_id", "cart_id", "created_at", "updated_at", "deleted_at"];

    public function product(){
        return $this->belongsTo(Products::class, "products_id", "id");
    }

    public function cart(){
        return $this->belongsTo(Cart::class, "cart_id", "id");
    }
}
