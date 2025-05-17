<?php

namespace Database\Seeders;
use App\Models\Plan;
use App\Models\Membership;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Plan::factory()->count(50)->create();




    }
}
