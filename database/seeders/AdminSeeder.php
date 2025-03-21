<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Pastikan model User di-import

class AdminSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'), // Gunakan password yang aman di sini
            'level' => 'Admin', // Pastikan ada kolom level di tabel users
        ]);
    }
}
