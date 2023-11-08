<?php

namespace App\Livewire;

use Livewire\Component;

class RestAdmin extends Component
{
    public $active_tab = 'menu';
    public function render()
    {
        return view('livewire.rest-admin');
    }

    public function setTab($tab){
        $this->active_tab = $tab;
    }

}
