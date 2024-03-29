<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'admin',
            'cuenta' => '',
            'tel' => '',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'estado' => true, // O cualquier otro valor que corresponda
        ])->assignRole('Admin');    
    }
}