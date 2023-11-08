<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $us = 
        [
            [
            'name'                  => 'Leandro Da Cruz',
            'email'                 => 'leandro@email.com',
            'password'              =>  Hash::make('password'),
                'email_verified_at'     => now(),
            ],
            [
                'name'                  => 'Inocência Da Cruz',
                'email'                 => 'inocência@email.com',
                'password'              =>  Hash::make('password'),
                'email_verified_at'     => now(),
            ],
            [
                'name'                  => 'Marcos Mabote',
                'email'                 => 'marcos@email.com',
                'password'              =>  Hash::make('password'),
                'email_verified_at'     => now(),
            ],
            [
                'name'                  => 'Jaime Vuma',
                'email'                 => 'jaime@email.com',
                'password'              =>  Hash::make('password'),
                'email_verified_at'     => now(),
            ],
            [
                'name'                  => 'Edson Da Cruz',
                'email'                 => 'edson@email.com',
                'password'              =>  Hash::make('password'),
                'email_verified_at'     => now(),
            ]
        ];
        foreach ($us as $u) {
            User::create($u);
        }
        
        
    }
}
