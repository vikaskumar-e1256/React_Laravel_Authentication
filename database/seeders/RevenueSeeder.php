<?php

namespace Database\Seeders;

use App\Models\Cost;
use App\Models\Revenue;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cost = Cost::inRandomOrder()->first();
        Revenue::insert([
            'add_id' => fake()->randomDigit(),
            'amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 550),
            'date'   => $cost->date,
            'campaign_id' => $cost->campaign_id
        ]);
        Revenue::insert([
            'add_id' => fake()->randomDigit(),
            'amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 550),
            'date'   => $cost->date,
            'campaign_id' => $cost->campaign_id
        ]);
        Revenue::insert([
            'add_id' => fake()->randomDigit(),
            'amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 550),
            'date'   => $cost->date,
            'campaign_id' => $cost->campaign_id
        ]);
        Revenue::insert([
            'add_id' => fake()->randomDigit(),
            'amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 550),
            'date'   => $cost->date,
            'campaign_id' => $cost->campaign_id
        ]);
    }
}
