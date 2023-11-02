<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KitchenType extends Model
{
    use HasFactory;

    public function rest(){
        return $this->HasOne(Restaurant::class);
    }
}
