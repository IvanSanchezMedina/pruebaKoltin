<?php

namespace App\Http\Livewire\Chat;

use Livewire\Component;
use App\Models\User;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\Post;
class CreateChat extends Component
{
    public $users;
    public $message= 'Hola me interesa tu publicacion ';
    public $userId;
    public $postId;

    public function mount($posts)
    {
        $this->userId= $posts->id_creator;
        $this->postId= $posts->id;
    }

    public function checkconversation($receiverId)
    {
        $post = Post::find($this->postId);

        $now=  date('Y-m-d H:i:s');
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)
        ->where('sender_id', $receiverId)
        ->orWhere('receiver_id', $receiverId)
        ->where('sender_id', auth()->user()->id)
        ->get();

        if (count($checkedConversation) == 0) {

            $createdConversation= Conversation::create([
                'receiver_id'=>$receiverId,
                'sender_id'=>auth() ->user()->id,
                'last_time_message'=>$now
            ]);

            $createdMessage= Message::create([
                'conversation_id'=>$createdConversation->id,
                'sender_id'=>auth()->user()->id,
                'receiver_id'=>$receiverId,
                'body'=>$this->message.' "'.$post->title.'"'
            ]);

            $createdConversation->last_time_message= $createdMessage->created_at;
            $createdConversation->save();

            return redirect()->to('/chat');

        } else if (count($checkedConversation) >= 1) {

            return redirect()->to('/chat');

        }
    }
    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
