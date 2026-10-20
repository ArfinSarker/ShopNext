<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@shopnext.com'],
            [
                'name' => 'ShopNext Admin',
                'phone' => '01700000000',
                'role' => 'admin',
                'password' => Hash::make('admin12345'),
            ]
        );
    }
}
