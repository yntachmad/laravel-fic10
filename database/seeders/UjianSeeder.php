<?php

namespace Database\Seeders;

use App\Models\Ujian;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ujian::factory(200)->create();
    }
}
