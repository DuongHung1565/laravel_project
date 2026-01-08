<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Member;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1️⃣ Tạo 5 ng
        $members = Member::factory()->count(5)->create();

        // 2️⃣ Mỗi cửa hàng có ít nhất 4 sản phẩm
        foreach ($members as $member) {
            Book::factory()->count(4)->create([
                'members_id' => $member->id
            ]);
        }
    }
}
