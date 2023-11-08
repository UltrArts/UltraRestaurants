<?php

namespace App\Livewire;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Illuminate\Support\Facades\Storage;

use Livewire\Component;
use App\Models\{
    MenuItem,
    Restaurant,
    User,
};

class Menu extends Component
{
    use LivewireAlert;
    use WithFileUploads;


    public $name, $path, $tabNew = true, $items, $editId = null;
    public function render()
    {
        $this->items = MenuItem::orderBy('updated_at', 'desc')->get();
        return view('livewire.menu');
    }

    public function saveItem(){

        if(!empty($this->editId)){
            $this->updateItem();
            // break;
        }
        else{
            $this->validate([
                'name'      =>  'bail | required | min:2',
                'path'         => 'bail | required | image|max:1024',
            ]);
            
            // Gere um nome único para o arquivo
            $fileName = 'storage/products-photos/' . uniqid() . '.' . $this->path->getClientOriginalExtension();
            // Armazene a imagem no diretório "storage/app/public"
            try {
                $this->path->storeAs('public', $fileName);
            } catch (\Throwable $th) {
                dd($th);
            }

            MenuItem::create([
                'item_name'         =>  $this->name,
                'path'              =>  $fileName,
                'rest_id'           =>  auth()->user()->id,
            ]);
            

            $this->alert('success', 'Item Gravado Com Sucesso!', [
                'position' => 'center',
                'timer' => 3000,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
            $this->clear();
        }
    }

    public function updateItem(){

        $i = MenuItem::find($this->editId);
        if(!empty($this->path)){

            // Gere um nome único para o arquivo
            $fileName = 'storage/products-photos/' . uniqid() . '.' . $this->path->getClientOriginalExtension();
            // Armazene a imagem no diretório "storage/app/public"
            try {
                $this->path->storeAs('public', $fileName);
                $i->path = $fileName;
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        !empty($this->name) ?   $i->item_name    =    $this->name   :   '';
        $i->save();

        $this->alert('success', 'Item Actualizado Com Sucesso!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        $this->clear();
    }

    public function setTab($tab){
        $this->tabNew = $tab;
    }

    public function deleteItem($id){
        MenuItem::find($id)->delete();
    }

    public function setItem($id){
        $i = MenuItem::orderBy('updated_at', 'desc')->find($id);
        $this->name =  $i->item_name;
        $this->tabNew = true;
        $this->editId = $id;
    }
    
    public function clear(){
        $this->editId = null;
        $this->path = null;
        $this->name = null;
        // break;
    }
}
