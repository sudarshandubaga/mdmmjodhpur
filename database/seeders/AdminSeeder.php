<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "Maharshi Dadhichi Mahila Mahavidyalaya";
        $user->login_name = "mdmmjodhpur";
        $user->password = Hash::make("admin@123");
        $user->save();
    }
}
