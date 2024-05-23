<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['total','route', 'customers_id', 'dateOrder', 'status','registerby'];
    protected $guarded = ['id', 'route', 'created_at', 'updated_at', 'dateOrder', 'status','registerby'];

    public function order_details() {
        return $this->hasMany(Order_detail::class);
    }

    public function customers() {
        return $this->belongsTo(Customer::class);
    }

}
