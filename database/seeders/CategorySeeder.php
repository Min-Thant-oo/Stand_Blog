<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $rows = [
            [
                'name' => 'frontend',
                'slug' => 'frontend',
            ],
            [
                'name' => 'backend',
                'slug' => 'backend',
            ],
            [
                'name' => 'javaScript',
                'slug' => 'javascript',
            ],
            [
                'name' => 'jQuery',
                'slug' => 'jQuery',
            ],
            [
                'name' => 'python',
                'slug' => 'python',
            ],
            
        ];

        Category::insert($rows);
    }
}
