<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'nama' => 'Bintang Ramadhan',
            'username' => 'Bintang',
            'password' => bcrypt(123)
        ]);
    
            // Menambahkan lebih banyak data jika perlu
    
    }
}
