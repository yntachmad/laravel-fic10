<?php

namespace Database\Seeders;

use App\Models\UjianSoalList;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjianSoalListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UjianSoalList::factory(200)->create();
    }
}
