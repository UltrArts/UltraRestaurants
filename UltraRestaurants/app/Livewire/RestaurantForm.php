<?php

namespace App\Livewire;

use Livewire\Component;

class RestaurantForm extends Component
{
    public $item = 2121;
    public function render()
    {
        return view('livewire.restaurant-form');
    }
}
