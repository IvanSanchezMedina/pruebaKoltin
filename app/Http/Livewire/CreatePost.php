<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Auth;
class CreatePost extends Component
{

    public $open = false;
    public $title, $content;

    public function save(){
        $user = auth()->user();

        Post::create([
            'title'=>$this->title,
            'content'=>$this->content,
            'id_creator'=>$user->id
        ]);
        $this->reset(['open','title','content']);
        $this->emit('render');
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}
