<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class SendMessage extends Component
{
    use WithFileUploads;

    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $photo;
    public $createdMessage;

    protected $listeners = ['updateSendMessage', 'dispatchMessageSent','resetComponent'];


    public function resetComponent()
    {
        $this->selectedConversation= null;
        $this->receiverInstance= null;
    }

    function updateSendMessage(Conversation $conversation, User $receiver)
    {
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;

    }

    public function sendMessage()
    {
        if ($this->body == null && $this->photo == null) {
            return null;
        }

        $dataUrl='';
        $type='text';
        if ($this->photo != null) {
            $this->validate([
             'photo' => 'image', // 1MB Max
         ]);

         $this->photo->store('public/photos');
         $dataUrl=$this->photo->store('public/photos');
         $type='image';

         }
        // $this->validate([
        //     'photo' => 'image', // 1MB Max
        // ]);


        $this->createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->id(),
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
            'type'=>$type,
            'url'=>$dataUrl
        ]);

        $this->selectedConversation->last_time_message = $this->createdMessage->created_at;
        $this->selectedConversation->save();

        $this->emitTo('chat.chatbox', 'pushMessage', $this->createdMessage->id);
        $this->emitTo('chat.chat-list', 'refresh');

        $this->reset('body');
        $this->photo=null;
        $this->emitSelf('dispatchMessageSent');

    }

    public function dispatchMessageSent()
    {
        broadcast(new MessageSent(Auth()->user(), $this->createdMessage, $this->selectedConversation, $this->receiverInstance));

    }
    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
