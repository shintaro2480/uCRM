<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        \App\Models\Purchase::factory(100)->create();

/*
.
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        */
    }
}
