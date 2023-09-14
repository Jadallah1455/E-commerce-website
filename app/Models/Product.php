<?php

namespace App\Models;

use App\Models\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;



    // protected $fillable = ['name_en','name_ar','image','price','sale_price','quantity'];  هنا بتعطيع كل الحقول الي بدك اياها تروح على قاعدة البيانات

    protected $guarded =[]; // اما هادا الامر بكتب داخل المصفوفة مين هيا الحقول الي بدك تمنعها تروح على قاعدة البيانات

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function cart()
    {
        return $this->hasMany(Cart::class);
    }

    public function order_item()
    {
        return $this->hasMany(OrderItem::class);
    }
}
