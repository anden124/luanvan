<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Brand;

class CategoryBrandSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // CATEGORY
        // =========================

        Category::create([
            'name' => 'Điện thoại thông minh',
            'slug' => 'dien-thoai-thong-minh'
        ]);

        Category::create([
            'name' => 'Máy tính bảng',
            'slug' => 'may-tinh-bang'
        ]);

        Category::create([
            'name' => 'Phụ kiện',
            'slug' => 'phu-kien'
        ]);

        // =========================
        // BRAND
        // =========================

        Brand::create([
            'name' => 'Apple',
            'slug' => 'apple'
        ]);

        Brand::create([
            'name' => 'Samsung',
            'slug' => 'samsung'
        ]);

        Brand::create([
            'name' => 'Xiaomi',
            'slug' => 'xiaomi'
        ]);

        Brand::create([
            'name' => 'Oppo',
            'slug' => 'oppo'
        ]);

        Brand::create([
            'name' => 'Realme',
            'slug' => 'realme'
        ]);

        Brand::create([
            'name' => 'Nokia',
            'slug' => 'nokia'
        ]);

        // Brand cho tablet
        Brand::create([
            'name' => 'iPad',
            'slug' => 'ipad'
        ]);

        // Brand phụ kiện
        Brand::create([
            'name' => 'Anker',
            'slug' => 'anker'
        ]);

        Brand::create([
            'name' => 'Baseus',
            'slug' => 'baseus'
        ]);
    }
}