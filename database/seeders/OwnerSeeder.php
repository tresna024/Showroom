<?php

namespace Database\Seeders;

use App\Models\Owners;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Owners::create([
            'nama' => 'Adrio Fahrezi',
            'username' => 'dio',
            'password' => bcrypt(123)
        ]);
    }
}
