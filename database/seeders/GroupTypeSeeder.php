<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('group_types')->insert([
            [
                'group_name' => 'Group A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => 'Group B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'group_name' => 'Group C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
