<?php

namespace App\Livewire;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

use App\Models\{
    KitchenType,
    Restaurant
};

use Livewire\Component;


class RestManage extends Component
{
    use LivewireAlert;
    public  $is_rest, $curr_res;
    public function render()
    {
        $this->curr_res = Restaurant::where('user_id', auth()->user()->id)->first();
        if(($is_rest = ! is_null($this->curr_res)) && ! session()->has('rest'))
            session(['rest' => $this->curr_res]);

        return view('livewire.rest-manage')
        ->with(['is_rest' => !is_null($this->curr_res)]);
    }

    public function details($name){
        return
            Restaurant::where('name', $name)->count() == 0 ?
            redirect()->back() :
            view('details', compact('name'));
    }
}
