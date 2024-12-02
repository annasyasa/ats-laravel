<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name'=>'guru',
            'email'=>'guru@gmail.com',
            'role'=>'guru',
            'password'=>Hash::make('guru123')
        ]);
        //kasir
        User::create([
            'name'=>'murid',
            'email'=>'murid@gmail.com',
            'role'=>'murid',
            'password'=>Hash::make('murid123')
        ]);
    }
}
