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
            'cuenta' => '00000000000',
            'tel' => '00000000',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
        // ->assignRole('Admin')
        
}

}