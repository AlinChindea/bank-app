<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $customers = Customer::factory(5)->create();
        $customers->each(function ($customer) {
                \App\Models\Account::factory(rand(1, 3))
                    ->create(['customer_id' => $customer->id,
                ]);
            });
    }
}
