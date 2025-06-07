<?php

namespace Database\Seeders;

use App\Modules\Auth\Models\User;
use App\Modules\Product\Models\Category;
use App\Modules\Product\Models\Product;
use Illuminate\Database\Seeder;

class ProductUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory(5)->create();

        $products = Product::factory(20)->create([
            'category_id' => $categories->random()->id,
        ]);


        $users = User::factory(3)->create();

        foreach ($users as $user) {
            $favorites = $products->random(5);
            $user->favorites()->attach($favorites);
        }
    }
}
