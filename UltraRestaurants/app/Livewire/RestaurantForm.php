<?php

namespace App\Livewire;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Storage;

use App\Models\{
    KitchenType,
    Restaurant
};
use Livewire\Component;

class RestaurantForm extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public $item;
    public $kitchen, $k_selected, $name ,$min ,$max , $open, $close, $address, $cover, $curr_res;
    public function render()
    {
        $this->kitchen = KitchenType::get();
        $this->setRest();
        return view('livewire.restaurant-form');
    }

    public function resRegister(){
         
        $this->validate([
            'name'          => 'bail | required',
            'min'           => 'bail | required | numeric | min:30',
            'max'           => 'bail | required | numeric | min:100',
            'address'       => 'bail | required',
            'cover'         => 'bail | required | image|max:1024',
            'open'          => 'bail | required',
            'close'         => 'bail | required',
            'k_selected'    => 'bail | required |',
        ]);

        // Gere um nome único para o arquivo
        $fileName = 'storage/rests-profile-photos/' . uniqid() . '.' . $this->cover->getClientOriginalExtension();

        // Armazene a imagem no diretório "storage/app/public"
        try {
            //code...
            $this->cover->storeAs('public', $fileName);
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }

        Restaurant::create([
            'name'          =>  $this->name,
            'min_price'     =>  $this->min, 
            'max_price'     =>  $this->max,
            'address'       =>  $this->address,
            'cover'         =>  $fileName,
            'user_id'       =>  auth()->user()->id,
            'kitchen_id'    =>  $this->k_selected  ,
            'open_time'     =>  $this->open,
            'close_time'     =>  $this->close
        ]);

        $this->alert('success', 'Restaurante Registado Com Sucesso!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        // Limpe o campo da imagem após o upload
        $this->reset('cover');


        return redirect()->route('dashboard');

    }

    public function resUpdate(){
        
        $r = Restaurant::find($this->curr_res->id);
        if(!empty($this->cover)){
            // Gere um nome único para o arquivo
            $fileName = 'storage/rests-profile-photos/' . uniqid() . '.' . $this->cover->getClientOriginalExtension();

            // Armazene a imagem no diretório "storage/app/public"
            try {
                $this->cover->storeAs('public', $fileName);
                !empty($fileName)           ? $this->curr_res->cover        =  $fileName : '';
            } catch (\Throwable $th) {
                //throw $th;
                dd($th);
            }
        }

        // dd($r );
        !empty($this->name)         ?  $r->name         =  $this->name          : '';
        !empty($this->min)          ?  $r->min_price    =  $this->min           : '';
        !empty($this->max)          ?  $r->max_price    =  $this->max           : '';
        !empty($this->address)      ?  $r->address      =  $this->address       : '';
        !empty($this->k_selected)   ?  $r->kitchen_id   =  $this->k_selected    : '';
        !empty($this->open)         ?  $r->open_time    =  $this->open          : '';
        !empty($this->close)        ?  $r->close_time   =  $this->close         : '';
        $r->save();
        $this->alert('success', 'Dados Actualizados Com Sucesso!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);

        // Limpe o campo da imagem após o upload
        $this->reset('cover');

    }

    public function setRest(){
        $this->curr_res = Restaurant::with('KitchenType')->where('user_id', auth()->user()->id)->first();
        // dd($this->curr_res->kitchen_id);
        if(($is_rest = ! is_null($this->curr_res)) || ! session()->has('rest')){
            session(['rest' => $this->curr_res]);
            $this->name =  $this->curr_res->name;
            $this->min =  $this->curr_res->min_price;
            $this->max =  $this->curr_res->max_price;
            $this->address =  $this->curr_res->address;
            $fileName =  $this->curr_res->cover;
            // $this->k_selected   =  $this->curr_res->kitchen->desc;
            $this->open =  $this->curr_res->open_time;
            $this->close =  $this->curr_res->close_time;
        }
    }
}
