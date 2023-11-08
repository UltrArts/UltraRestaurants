<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;
    protected $fillable = [
        'item_name',
        'path',
        'rest_id',
    ];

    public function rest()
    {
        return $this->hasOne(Restaurant::class);
    }

}
