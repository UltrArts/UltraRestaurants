<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = [
        'rate',
        'user_id',
        'rest_id',
    ];

            
    
    public function rest()
    {
        return $this->hasOne(Restaurant::class);
    }
    

    public function rates(){
        return $this->belongsToMany(Rate::class);
    }

}
