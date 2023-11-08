<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\{
    KitchenType,
    Restaurant,
    MenuItem
};


class Details extends Component
{
    public $rest_name, $rest, $items;
    public function render()
    {
        $this->rest = Restaurant::where('name', $this->rest_name)->first();
        $this->items = MenuItem::orderBy('updated_at', 'desc')->get();
        // dd($this->items);
        // dd($this->rest->open_time);
        return view('livewire.details');
    }
}
