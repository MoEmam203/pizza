<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'SuperAdmin',
            'email' => 'super_admin@admin.com',
            'password' => Hash::make('super_admin@admin.com'),
            'is_admin' => 1
        ]);
    }
}
