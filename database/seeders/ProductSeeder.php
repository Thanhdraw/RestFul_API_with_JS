<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            for ($i = 1; $i <= 5; $i++) {
                $price = number_format(rand(100000, 10000000) / 10, 2, '.', ''); // chia cho 100 để có 2 chữ số thập phân

                // Generate a unique slug by appending the loop index or a random number
                $slug = 'san-pham-' . $category->id . '-' . $i . '-' . time();

                Product::create([
                    'name' => $categories[$i - 1]->name . ' ' . $i++,
                    'slug' => $slug,
                    'category_id' => $category->id,
                    'description' => 'Mô tả ' . $i,
                    'price' => $price,
                    'image' => 'https://via.placeholder.com/150',
                ]);
            }
        }
    }
}
