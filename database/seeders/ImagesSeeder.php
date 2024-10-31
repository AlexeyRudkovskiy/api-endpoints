<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::all()->each(function (Product $product) {
            Image::factory()
                ->state(new Sequence(
                    [ 'product_id' => $product->id, 'position' => 0 ],
                    [ 'product_id' => $product->id, 'position' => 1 ],
                    [ 'product_id' => $product->id, 'position' => 2 ]
                ))
                ->count(3)
                ->create();
        });
    }
}
