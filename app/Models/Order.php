<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\Subtotal;


class Order extends Model
{
    use HasFactory;
    //以下はScopeを追加するお決まりの記述。Subtotalというスコープを適用させていく。
    protected static function booted()
    {
        static::addGlobalScope(new Subtotal);
    }
}
