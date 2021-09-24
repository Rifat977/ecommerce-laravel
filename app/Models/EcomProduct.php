<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcomProduct extends Model
{
    use HasFactory;
    protected $fillable =[
        'productName', 'categoryId', 'sku',
        'image', 'regularPrice', 'price', 'stock',
        'description'
    ];
    public function Category(){
        return $this->belongsTo(EcomCategory::class, 'categoryId', 'id');
    }
}
