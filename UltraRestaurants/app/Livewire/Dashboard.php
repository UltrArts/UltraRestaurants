<?php

namespace App\Livewire;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\{
    Restaurant,
    KitchenType,
    Rate,
    Photo,
    User,
    MenuItem,
    Comment
};

use Livewire\Component;

class Dashboard extends Component
{
    use LivewireAlert;
    public $rate;
    public $showModal = false;
    public $rests, $is_chat = false, $current_id, $comment, $comments;
    public function render()
    {
        $this->rests = Restaurant::get();
        $this->comments = Comment::with('user')->get();
        // dd($this->comments[2]->user);
        return view('livewire.dashboard');
    }

    public function setRating($number, $id){
        $this->rate = $number;

        $starsHtml = '';
        for ($i = 1; $i <= 5; $i++) {
            $starsHtml .= '<i class="fa fa-star' . ($i <= $number ? ' rated' : '') . '"></i>';
        }
    
        $this->alert('success', '', [
            'title' => '<div class="text-center">' . $starsHtml . '</div>',
            'text'  => 'Classificação actualizada com sucesso!',
            'position' => 'center',
            'timer' => 1500,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
        // <div class='text-danger text-center'>dasd </div>
    }

    private function clean(){

    }

    public function showChat($id){
        $this->current_id = $id;
        $this->is_chat = true;
    }

    public function hideChat(){
        $this->current_id = null;
        $this->is_chat = false;
        $this->comment = null;
    }

    public function saveComment(){
        if(empty($this->comment)){
            $this->alert('warning', 'Por favor, escreva algum comentário!', [
                'position' => 'center',
                'timer' => 1500,
                'toast' => true,
                'timerProgressBar' => true,
            ]);
        }else{
            // $this->comment
            Comment::create([
                'comment'   =>  $this->comment,
                'user_id'   =>  auth()->user()->id,
                'rest_id'   =>  $this->current_id,
            ]);
            $com = Comment::where('rest_id', $this->current_id)->get();
            $this->comment = null;
            $this->comments = Comment::with('user')->get();
        }
    }

    public function deleteComment($id){
        $com = Comment::find($id);
        $com->delete();
        $this->comments = Comment::with('user')->get();
        $this->alert('success', 'Comentário eliminado com sucesso!', [
            'position' => 'center',
            'timer' => 1500,
            'toast' => true,
            'timerProgressBar' => true,
        ]);
    }

}
