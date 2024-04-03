<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total', 'customers_id'];
    protected $guarded = ['id','created_at', 'updated_at'];

    public function order_details() {
        return $this->hasMany(Order_detail::class);
    }

    public function customers() {
        return $this->belongsTo(Customer::class);
    }

}
