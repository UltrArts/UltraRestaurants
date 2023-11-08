<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\DB;
use App\Models\Restaurant;
use App\Models\KitchenType;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Carbon;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $names = [
            'Restaurante Boa vida', 
            'Acácias\'s House',
            'Hotel 2007',
            'Hotel Lusomundo',
            'Resotel'
        ];

        $al = [   
            'a','b','c','d','e','f','g','h','i','j','k'
            , 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u',
            'v', 'w', 'x', 'y', 'z', 'A', 'B', 'C', 'D', 'E',
            'F','G','H','I','J','K', 'L', 'M', 'N', 'O', 'P',
            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
            '0', '2', '3', '4', '5', '6', '7', '8', '9', ' '
        ];

        // Gere um valor aleatório entre 00:00:00 e 23:59:59
        
        for ($i=1; $i < 6; $i++) { 
            Restaurant::create([
                'name'          =>  $names[$i-1],
                'min_price'     =>  rand(50, 300),
                'max_price'     =>  rand(301, 30000),
                'address'       =>  $this->generateRandomString(rand(20, 100), $al ),
                'open_time'     =>  $this->getTime(),
                'close_time'    =>  $this->getTime(),
                'kitchen_id'    =>  $this->getKitchen(),
                'user_id'       =>  $i,
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

    public function getTime(){
        $open = Carbon::createFromTime(rand(0, 23), rand(0, 59), 0);
            // Formatando a hora no formato HH:MM:SS
        return $open->format('H:i:s');
    }

    private function getKitchen(){
        return KitchenType::inRandomOrder()->value('id');
    }

    private function getUser($id){
        return User::find($id)->get('id');
    }

}
