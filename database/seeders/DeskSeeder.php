<?php

namespace Database\Seeders;

use App\Models\Desk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $names = ['Desk A', 'Desk B', 'Desk C', 'Desk D', 'Desk E'];
        $symbols = ['💻', '📚', '🖊️', '📁', '🍵'];

        foreach (range(1, 5) as $index) {
            Desk::create([
                'name' => $names[array_rand($names)],
                'symbol' => $symbols[array_rand($symbols)],
                'position_x' => rand(0, 500),
                'position_y' => rand(0, 500),
            ]);
        }
    }
}
