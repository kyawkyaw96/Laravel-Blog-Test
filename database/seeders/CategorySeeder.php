<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Local News', 'World News', 'Sports', 'Food', "Travel"];
        $arr = [];
        foreach ($categories as $category) {
            $arr[] = [
                "title" => $category,
                "user_id" => rand(1, 11),
                "created_at" => now(),
                "updated_at" => now()
            ];
        }
        Category::insert($arr);
    }
}
