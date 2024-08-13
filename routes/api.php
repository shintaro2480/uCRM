<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Customer;

Route::get('/searchCustomers', function (Request $request) {
    return Customer::searchCustomers($request->search)->select('id', 'name', 'kana', 'tel')->paginate(50);
})->middleware('auth:sanctum');
