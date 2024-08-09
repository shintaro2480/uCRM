<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;


class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [ 
        'customer_id', 
        'status', 
    ];

    //多対1の関係になるので、単数形でいい
    public function customer(){
        return $this->belongsTo(Customer::class);
    }

}
