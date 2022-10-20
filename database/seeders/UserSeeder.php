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
        User::create([
            'name' => 'Leenh Alexander Bustamante Fernandez',
            'email' => 'hackingleenh@gmail.com',
            'password' => bcrypt('321321'),
        ]);
        User::factory(8)->create();
    }
}
