<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;
use App\Models\Item;


class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'status',
    ];

    //多対1の関係になるので、単数形でいい
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    //itemsとは多対多
    public function items()
    {
        return $this->belongsToMany(Item::class)->withPivot('quantity');
    }
}
