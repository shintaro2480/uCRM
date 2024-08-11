<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Purchase;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call([ 
            UserSeeder::class, 
            ItemSeeder::class
            ]);
        // User::factory(10)->create();

        \App\Models\Customer::factory(400)->create();

        $items = \App\Models\Item::all();

        Purchase::factory(100)->create()->each(function(Purchase $purchase) use ($items){ 
    $purchase->items()->attach( 
    $items->random(rand(1,3))->pluck('id')->toArray(),  
    // 1～3個のitemをpurchaseにランダムに紐づけ     
    ['quantity' => rand(1, 5) ] );  });

    }
}
