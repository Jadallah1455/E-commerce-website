<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function order_item()
    {
        return $this->hasMany(OrderItem::class);
    }

}
