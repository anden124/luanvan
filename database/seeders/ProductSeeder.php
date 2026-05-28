<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage; 
use App\Models\Brand;       // 🌟 Import Model Brand để gọi cho chuẩn Laravel
use App\Models\Category;    // 🌟 Import Model Category

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // 🌟 Bốc chính xác ID vừa được sinh ra từ CategoryBrandSeeder
        $appleId = Brand::where('name', 'Apple')->value('id');
        $samsungId = Brand::where('name', 'Samsung')->value('id');
        $xiaomiId = Brand::where('name', 'Xiaomi')->value('id');
        $oppoId = Brand::where('name', 'Oppo')->value('id');
        $ipadId = Brand::where('name', 'iPad')->value('id');
        $ankerId = Brand::where('name', 'Anker')->value('id');
        
        // 🌟 Đã sửa thành 'Điện thoại thông minh' để khớp hoàn toàn với danh mục bạn vừa tạo
        $categoryId = Category::where('name', 'Điện thoại thông minh')->value('id');

        // ==========================================================
        // SẢN PHẨM 1: iPhone 13 Pro Max
        // ==========================================================
        $iphone13 = Product::create([
            'brand_id' => $appleId, 
            'category_id' => $categoryId,
            'name' => 'iPhone 13 Pro Max 512GB - Xanh lá | Chính hãng VN/A',
            'slug' => 'iphone-13-pro-max-512gb',
            'specifications' => ['chip' => 'Apple A15 Bionic', 'ram' => '6GB', 'screen' => '6.7 inch'],
            'description' => 'Siêu phẩm Apple 2021...', 'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $iphone13->id, 'sku' => 'IP13PM-512', 'color' => 'Xanh lá',
            'capacity' => '512GB', 'price' => 39490000, 'stock' => 10
        ]);
        ProductImage::create(['product_id' => $iphone13->id, 'image' => 'iphone-13-pro-max-10_1.png']);

        // ==========================================================
        // SẢN PHẨM 2: OPPO Reno7 Z
        // ==========================================================
        $oppoReno7 = Product::create([
            'brand_id' => $oppoId, 
            'category_id' => $categoryId,
            'name' => 'OPPO Reno7 Z (5G)',
            'slug' => 'oppo-reno7-z-5g',
            'specifications' => ['chip' => 'Snapdragon 695', 'ram' => '8GB', 'screen' => '6.43 inch'],
            'description' => 'Thiết kế thời thượng, sạc siêu nhanh...', 'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $oppoReno7->id, 'sku' => 'OPPO-RENO7Z', 'color' => 'Bạc Đa Sắc',
            'capacity' => '128GB', 'price' => 9190000, 'stock' => 20
        ]);
        ProductImage::create(['product_id' => $oppoReno7->id, 'image' => 'OPPO Reno7 Z (5G) 1.webp']); 

        // ==========================================================
        // SẢN PHẨM 3: Xiaomi Mi 11 Lite
        // ==========================================================
        $xiaomiMi11 = Product::create([
            'brand_id' => $xiaomiId, 
            'category_id' => $categoryId,
            'name' => 'Xiaomi Mi 11 Lite 5G',
            'slug' => 'xiaomi-mi-11-lite-5g',
            'specifications' => ['chip' => 'Snapdragon 780G', 'ram' => '8GB', 'screen' => '6.55 inch'],
            'description' => 'Siêu mỏng nhẹ, màn hình 90Hz...', 'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $xiaomiMi11->id, 'sku' => 'MI11-LITE', 'color' => 'Xanh Bạc Hà',
            'capacity' => '128GB', 'price' => 7490000, 'stock' => 15
        ]);
        ProductImage::create(['product_id' => $xiaomiMi11->id, 'image' => 'Xiaomi Mi 11 Lite 5G 1.webp']);

        // ==========================================================
        // SẢN PHẨM 4: Samsung Galaxy S22 Ultra
        // ==========================================================
        $samsungS22 = Product::create([
            'brand_id' => $samsungId, 
            'category_id' => $categoryId,
            'name' => 'Samsung Galaxy S22 Ultra 5G',
            'slug' => 'samsung-galaxy-s22-ultra-5g',
            'specifications' => ['chip' => 'Snapdragon 8 Gen 1', 'ram' => '12GB', 'screen' => '6.8 inch, 120Hz'],
            'description' => 'Đỉnh cao Flagship Samsung tích hợp bút S Pen quyền năng...', 
            'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $samsungS22->id, 'sku' => 'SS-S22U-256', 'color' => 'Đen Phantom',
            'capacity' => '256GB', 'price' => 21990000, 'stock' => 8
        ]);
        ProductImage::create(['product_id' => $samsungS22->id, 'image' => 'Samsung Galaxy S22 Ultra 3.webp']);
   // ==========================================================
        // SẢN PHẨM 5: iPad Air 11 inch M4 Wifi 128GB 2026
        // ==========================================================

        $ipad = Product::create([
            'brand_id' => $ipadId, 
            'category_id' => $categoryId,
            'name' => 'iPad Air 11 inch M4 Wifi 128GB 2026',
            'slug' => 'ipad-air-11-inch-m4-wifi-128gb-2026',
            'specifications' => ['chip' => 'M4', 'ram' => '8GB', 'screen' => '11 inch'],
            'description' => 'iPad Air 11 inch M4 Wifi 128GB 2026', 
            'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $ipad->id, 'sku' => 'IPAD-AIR-11-inch-M4-Wifi-128GB-2026', 'color' => 'Bạc',
            'capacity' => '128GB', 'price' => 15990000, 'stock' => 10
        ]);
        ProductImage::create(['product_id' => $ipad->id, 'image' => 'iPad Air 11 inch M4 Wifi 128GB 2026 1.webp']);
// ==========================================================
        // SẢN PHẨM 6: Anker PowerCore 20000
        // ===


    $anker = Product::create([
            'brand_id' => $ankerId, 
            'category_id' => $categoryId,
            'name' => 'Anker PowerCore 20000',
            'slug' => 'anker-powercore-20000',
            'specifications' => ['capacity' => '20000mAh', 'output' => '2.4A'],
            'description' => 'Pin sạc dự phòng Anker PowerCore 20000', 
            'status' => true,
        ]);
        ProductVariant::create([
            'product_id' => $anker->id, 'sku' => 'ANKER-PC-20000', 'color' => 'Đen',
            'capacity' => '20000mAh', 'price' => 499000, 'stock' => 20
        ]);
        ProductImage::create(['product_id' => $anker->id, 'image' => 'Anker PowerCore 20000 1.webp']);

    }
}