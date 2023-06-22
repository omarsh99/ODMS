<?php

namespace Database\Seeders;

use App\Models\Category;
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

        $categories = Category::factory()->count(3)->create();

        foreach (range(1, 5) as $index) {
            $desk = Desk::create([
                'name' => $names[array_rand($names)],
                'symbol' => $symbols[array_rand($symbols)],
                'position_x' => rand(0, 500),
                'position_y' => rand(0, 500),
            ]);

            $category = $categories->random();
            $desk->category()->associate($category);
            $desk->save();
        }
    }

}
