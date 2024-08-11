<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\Purchase; 

class Item extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'name', 
        'memo', 
        'price', 
        'is_selling' 
    ];

    //Purchaseとは多対多
    public function purchases() 
    { 
        return $this->belongsToMany(Purchase::class) 
        ->withPivot('quantity'); 
    }
}
