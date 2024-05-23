<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    protected $fillable = ['products_id', 'order_id', 'quantity', 'subtotal','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','registerby'];

    public function products() {
        return $this->belongsTo(Product::class);
    }
    public function orders() {
        return $this->belongsTo(Order::class);
    }
}
