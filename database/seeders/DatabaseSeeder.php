<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Tạo 5 cửa hàng
        $stores = Store::factory()->count(5)->create();

        // 2️⃣ Mỗi cửa hàng có ít nhất 4 sản phẩm
        foreach ($stores as $store) {
            Product::factory()->count(4)->create([
                'store_id' => $store->id
            ]);
        }
    }
}
