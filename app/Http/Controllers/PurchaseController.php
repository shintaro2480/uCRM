<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Http\Requests\StorePurchaseRequest;
use App\Http\Requests\UpdatePurchaseRequest;

use Inertia\Inertia;   
use App\Models\Customer;  
use App\Models\Item; 

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * 新規作成用の画面
     */
    public function create()
    {
        //画面表示用に、顧客を全件取って
        $customers = Customer::select('id', 'name', 'kana')->get(); 
        //今販売中の商品のみ取って
        $items = Item::select('id', 'name', 'price')->where('is_selling', true)->get(); 
        //上のデータをCreateビューに渡す
        return Inertia::render('Purchases/Create', [ 
            'customers' => $customers, 
            'items' => $items 
        ]);   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePurchaseRequest $request)
    {
        //
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Purchase $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePurchaseRequest $request, Purchase $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Purchase $purchase)
    {
        //
    }
}
