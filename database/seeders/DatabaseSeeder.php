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
        // Users
        \App\Models\User::factory()->create([
            'fullName' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin123'),
            'remember_token' => Str::random(10),
            'state'=>'admin','Number'=>'0600000000','image'=>'mlk_0.png'
        ],
        );
        \App\Models\User::factory()->create([
            'fullName' => 'ayoub',
            'email' => 'ayoub@email.com',
            'password' => Hash::make('ayoub123'),
            'remember_token' => Str::random(10),
            'state'=>'dropshiper','Number'=>'0682056234','image'=>'mlk_0.png'
        ],
        );
        \App\Models\User::factory()->create([
            'fullName' => 'mohamed',
            'email' => 'mohamed@email.com',
            'password' => Hash::make('mohamed123'),
            'remember_token' => Str::random(10),
            'state'=>'confirmateur','Number'=>'0682056234','image'=>'mlk_0.png'
        ],
        );
        \App\Models\User::factory()->create([
            'fullName' => 'med1',
            'email' => 'med1@email.com',
            'password' => Hash::make('med123'),
            'remember_token' => Str::random(10),
            'state'=>'printer1','Number'=>'0682056234','image'=>'mlk_0.png'
        ],
        );
        \App\Models\User::factory()->create([
            'fullName' => 'med2',
            'email' => 'med2@email.com',
            'password' => Hash::make('med123'),
            'remember_token' => Str::random(10),
            'state'=>'printer2','Number'=>'0682056234','image'=>'mlk_0.png'
        ],
        );

        
        // \App\Models\Employe::factory(10)->create();
    }
}