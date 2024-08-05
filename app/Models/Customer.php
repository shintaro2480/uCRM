<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['name','kana','tel','email','postcode','address', 'birthday','gender', 'memo']; 

//顧客検索をするクエリスコープ。
//もしビューからの$inputがnullではなくて、かつ名前のカナと電話番号で一致するものがあれば、一致したレコード群をwhere句を使って返す
    //
    public function scopeSearchCustomers($query, $input = null){
        if(!empty($input)){ 
            if(Customer::where('kana', 'like', $input . '%' ) 
            ->orWhere('tel', 'like', $input . '%')->exists()) 
            { 
                return $query->where('kana', 'like', $input . '%' ) 
                ->orWhere('tel', 'like', $input . '%'); 
            } 
        }
    }



}
