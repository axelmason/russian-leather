<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        $categoryIds = Category::query()
            ->whereHas('parent', function($query) {
                $query->whereHas('parent', function($q) {
                    $q->where('slug', 'products');
                });
            })
            ->pluck('id')->toArray();

        $products = [];

        for ($i = 0; $i < 1000; $i++) {
            $title = fake()->words(2, true);
            $products[] = [
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => fake()->text(100),
                'count' => random_int(0, 30),
                'price' => random_int(0, 10000),
                'category_id' => array_rand($categoryIds)
            ];
        }

        Product::insert($products);
    }
}
