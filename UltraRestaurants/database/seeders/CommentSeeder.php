<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;
use App\Models\Comment;
use App\Models\User;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $al = [   
            'a','b','c','d','e','f','g','h','i','j','k'
            , 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
            'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E',
            'F','G','H','I','J','K', 'L', 'M', 'N', 'O', 'P',
            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '2', '3', '4', '5', '6', '7', '8', '9', ' '
        ];
        for ($i=0; $i < 10; $i++) { 
            Comment::create([
                'comment'   =>  $this->generateRandomString(rand(20, 100), $al ),
                'user_id'   =>  User::inRandomOrder()->value('id'),
                'rest_id'   =>  Restaurant::inRandomOrder()->value('id'),
            ]);
        }
    }

    public function generateRandomString($length, $characters) {
        $randomString = '';
        $charCount = count($characters);
    
        for ($i = 0; $i < $length; $i++) {
            $randomCharacter = $characters[rand(0, $charCount - 1)];
            $randomString .= $randomCharacter;
        }
    
        return $randomString;
    }

}
