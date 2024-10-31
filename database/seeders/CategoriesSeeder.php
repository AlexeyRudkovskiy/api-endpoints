<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()
            ->count(2)
            ->has(Product::factory()->count(10))
            ->create()
            ->each(function (Category $category) {

                Category::factory()
                    ->state([ 'parent_id' => $category->id ])
                    ->has(Product::factory()->count(10))
                    ->count(2)
                    ->create()
                    ->each(function (Category $child) {

                        Category::factory()
                            ->state([ 'parent_id' => $child->id ])
                            ->has(Product::factory()->count(10))
                            ->count(2)
                            ->create();

                    });

            });
    }
}
