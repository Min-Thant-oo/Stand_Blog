<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Liam = User::factory()->create([
            'name' => 'Liam',
            'username' => 'liam',
            'email' => 'liam@example.com',
        ]);
        
        $Katy = User::factory()->create([
            'name' => 'Katy',
            'username' => 'katy',
            'email' => 'katy@example.com',
        ]);
        
        $Nate = User::factory()->create([
            'name' => 'Nate',
            'username' => 'nate',
            'email' => 'nate@example.com',
        ]);
        
        $Chloe = User::factory()->create([
            'name' => 'Chloe',
            'username' => 'chloe',
            'email' => 'chloe@example.com',
        ]);
        
        $Mike = User::factory()->create([
            'name' => 'Mike',
            'username' => 'mike',
            'email' => 'mike@example.com',
        ]);
    }
}
