<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
class ListPosts extends Component
{
    protected $listeners= ['render'=>'render'];

    public function render()
    {

        $posts = Post::all();
        // dd($posts);
        return view('livewire.list-posts',compact('posts'));
    }
}
