<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image', 'price', 'stock','status','registerby'];
    protected $guarded = ['id','created_at', 'updated_at','status','registerby'];

    public function order_details() {
        return $this->hasMany(Order_detail::class);
    }

}
