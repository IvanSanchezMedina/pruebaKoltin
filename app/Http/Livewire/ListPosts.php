<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
class ListPosts extends Component
{
    protected $listeners= ['render'=>'render'];

    public function render()
    {
        $posts = Post::with('user')->orderBy('id','desc')->get();

        return view('livewire.list-posts',compact('posts'));
    }
}
