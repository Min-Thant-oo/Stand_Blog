<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
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
                'name' => 'css',
                'slug' => 'css',
            ],
            [
                'name' => 'chrome',
                'slug' => 'chrome',
            ],
            [
                'name' => 'tutorial',
                'slug' => 'tutorial',
            ],
            [
                'name' => 'backend',
                'slug' => 'backend',
            ],
            [
                'name' => 'jQuery',
                'slug' => 'jQuery',
            ],
            [
                'name' => 'Javascript',
                'slug' => 'Javascript',
            ],
            [
                'name' => 'design',
                'slug' => 'design',
            ],
            [
                'name' => 'development',
                'slug' => 'development',
            ],
            
        ];

        Tag::insert($rows);
    }
}
