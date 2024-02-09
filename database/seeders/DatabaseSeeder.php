<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type_product;
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
             'email' => 'ayoub@gmail.com',
            'password' => Hash::make('ayoub123'),
            'remember_token' => Str::random(10),
            'state'=>'dropshiper','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
         \App\Models\User::factory()->create([
            'fullName' => 'ayman',
            'email' => 'ayman@gmail.com',
            'password' => Hash::make('ayman123'),
            'remember_token' => Str::random(10),
            'state'=>'admin','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
        \App\Models\User::factory()->create([
            'fullName' => 'printer1',
            'email' => 'printer1@gmail.com',
            'password' => Hash::make('printer1123'),
            'remember_token' => Str::random(10),
            'state'=>'printer1','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
        \App\Models\User::factory()->create([
            'fullName' => 'printer2',
            'email' => 'printer2@gmail.com',
            'password' => Hash::make('printer2123'),
            'remember_token' => Str::random(10),
            'state'=>'printer2','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
        
        \App\Models\User::factory()->create([
            'fullName' => 'printer11',
            'email' => 'printer11@gmail.com',
            'password' => Hash::make('printer2123'),
            'remember_token' => Str::random(10),
            'state'=>'dropshiper','Number'=>'0682056234','image'=>'mlk_0.png'
        ],);
        
       
    }
}