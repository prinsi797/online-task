<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::where('permission', 1)->first();
        if (empty($adminRole)) {
            $adminRole = Role::create([
                'name' => 'Admin',
                'permission' => 1,
            ]);
        }

        $adminCount = Admin::count();
        if (empty($adminCount)) {
            Admin::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('Admin@123'),
                'role_id' => $adminRole->id,
            ]);
        }
    }
}