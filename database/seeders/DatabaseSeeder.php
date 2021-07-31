<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use App\Models\Student;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        Category::factory(50)->create();
//        Product::factory(1000)->create();
//        Brand::factory(50)->create();
//        Book::factory(50)->create();
          Student::factory(200)->create();

    }
}
