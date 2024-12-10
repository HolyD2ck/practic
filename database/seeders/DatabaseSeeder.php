<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Categories;
use App\Models\Books;
use App\Models\Libraries;
use App\Models\Publishers;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Categories::factory()->count(100)->create();
        Publishers::factory()->count(100)->create();
        Books::factory()->count(100)->create();
        Libraries::factory()->count(100)->create();
    }
}
