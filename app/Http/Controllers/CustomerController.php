<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use COM;
use Inertia\Inertia;
use Inertia\Response;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ページネーションで得られる型をチェックするため、一度ddで出力
        /*
        $getTest = Customer::select('id','name','kana','tel')->get();
        $getPaginate = Customer::select('id','name','kana','tel')->paginate(50);
        dd($getTest, $getPaginate);
        */

                $customers = Customer::searchCustomers('ミヤ')->select('id','name','kana','tel')->paginate(50);
               dd($customers);

        return Inertia::render('Customers/Index', [
            //Customerモデルから全件引っ張ってくる。get()で終了させて、customers変数に代入してvueに渡す
            'customers' => Customer::select('id','name','kana','tel')->paginate(50)
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
