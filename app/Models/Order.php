<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function Payment(){
        return $this->belongsTo(PaymentDetail::class, 'id', 'order_id');
    }
    public function Customer(){
        return $this->belongsTo(Customer::class, 'user_id', 'id');
    }
    public function OrderItem(){
        return $this->belongsTo(OrderItem::class, 'user_id', 'id');
    }
}
