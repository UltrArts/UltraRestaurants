<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'min_price',
        'max_price',
        'rate',
        'address',
        'cover',
        'open_time',
        'close_time',
        'kitchen_id',
        'user_id',
    ];


    // relacionamentos entre modelos diferentes

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function rates(){
        return $this->belongsToMany(Rate::class);
    }

    public function comments(){
        return $this->belongsToMany(Comment::class);
    }

    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function photos(){
        return $this->belongsToMany(Photo::class);
    }

    public function menuItems(){
        return $this->belongsToMany(MenuItem::class);
    }

    public function kitchenType(){
        return $this->belongsTo(KitchenType::class);
    }

}
