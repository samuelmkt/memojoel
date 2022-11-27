<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClasseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classes')->insert([
            ['name' => 'L1-GL'],
            ['name' => 'L2-GL'],
            ['name' => 'L3-GL'],
            ['name' => 'M1-GL'],
            ['name' => 'M2-GL'],
            ['name' => 'L1-SI'],
            ['name' => 'L2-SI'],
            ['name' => 'L3-SI'],
            ['name' => 'M1-SI'],
            ['name' => 'M2-SI'],
            ['name' => 'L1-IM'],
            ['name' => 'L2-IM'],
            ['name' => 'L3-IM'],
            ['name' => 'M1-IM'],
            ['name' => 'M2-IM'],
            ['name' => 'M3-IM'],
            ['name' => 'Phd-GL'],
            ['name' => 'Phd-SI'],
            ['name' => 'Phd-IM'],
            ['name' => 'L3-SIRI'],
        ]);
    }
}
