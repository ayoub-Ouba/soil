<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'fullName' => 'ayoub',
            'email' => 'ayoub@email.com',
            'password' => Hash::make('ayoub123'),
            'remember_token' => Str::random(10),
            'state'=>'dropshiper','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
        
        // \App\Models\Employe::factory(10)->create();
    }
}