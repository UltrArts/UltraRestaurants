<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;



class KitchenTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'desc'  =>  'Linear'
            ],
            [
                'desc'  =>  'Em forma de U'
            ],
            [
                'desc'  =>  'Paralela'
            ],
            [
                'desc'  =>  'Em forma de L'
            ],
            [
                'desc'  =>  'Ilha'
            ],
            [
                'desc'  =>  'Gourment'
            ],
            [
                'desc'  =>  'Integrada'
            ],
        ];

        DB::table('kitchen_types')->insert($types);
    
    }
}
