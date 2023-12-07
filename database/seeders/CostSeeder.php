<?php

namespace Database\Seeders;

use App\Models\Cost;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $capaignId = fake()->randomNumber($nbDigits = NULL, $strict = false);
        Cost::insert([
            'add_id' => fake()->randomDigit(),
            'amount' => fake()->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 200),
            'date'   => fake()->date($format = 'Y-m-d', $max = 'now'), // '1979-06-09',
            'campaign_name' => fake()->word(),
            'campaign_id' => $capaignId
        ]);
    }
}
