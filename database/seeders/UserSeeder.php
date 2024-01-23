<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'Chamathka Dissanayaka',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
        ]);
        $superAdmin->assignRole('Super Admin');

        // DB::table('users')->insert([
        //     'name' => 'Chamathka Dissanayaka',
        //     'email' => 'superadmin@example.com',
        //     'password' => Hash::make('password'),
        // ]);
    }
}
