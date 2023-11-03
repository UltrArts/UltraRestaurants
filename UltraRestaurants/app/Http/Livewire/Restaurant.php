<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Restaurant extends Component
{
    public $item = 2000;
    public function render()
    {
        return view('livewire.restaurant')->with(['item' => 2000]);
    }
}
