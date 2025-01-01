<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Category::create(['name' => 'Điện thoại', 'slug' => 'dien-thoai']);
        Category::create(['name' => 'Laptop', 'slug' => 'laptop']);
        Category::create(['name' => 'Máy tính bảng', 'slug' => 'may-tinh-bang']);
        Category::create(['name' => 'Phụ kiện', 'slug' => 'phu-kien']);
        Category::create(['name' => 'Tivi', 'slug' => 'tivi']);
        Category::create(['name' => 'Máy ảnh', 'slug' => 'may-anh']);
        Category::create(['name' => 'Đồng hồ', 'slug' => 'dong-ho']);
        Category::create(['name' => 'Tai nghe', 'slug' => 'tai-nghe']);
        Category::create(['name' => 'Máy tính để bàn', 'slug' => 'may-tinh-de-ban']);
        Category::create(['name' => 'Thiết bị chơi game', 'slug' => 'thiet-bi-choi-game']);
    }
}
