<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class ChatComponent extends Component
{
    public $user;
    public $sender_id;
    public $receiver_id;
    public $message = '';

    public $messages = [];

    public function render()
    {
        return view('livewire.chat-component');
    }

    public function mount($user_id)
    {
        $this->sender_id = auth()->user()->id;
        $this->receiver_id = $user_id;
        $this->user = User::whereId($user_id)->first();

        $messages = Message::where(function ($query){
            $query->where('sender_id', $this->sender_id)
                ->where('receiver_id', $this->receiver_id);
        })->orWhere(function($query){
            $query->where('sender_id', $this->receiver_id)
                ->where('receiver_id', $this->sender_id);
        })
         ->with('sender:id,name', 'receiver:id,name')->get();


         foreach($messages as $message){
            $this->appendMessage($message);
         }
        
    }

    public function sendMessage()
    {
        $message = new Message();
        $message->sender_id = $this->sender_id;
        $message->receiver_id = $this->receiver_id;
        $message->message = $this->message;

        $message->save();

        $this->message = '';
    }


    public function appendMessage($message):void
    {
        $this->messages[] = [
            'id' => $message->id,
            'message' => $message->message,
            'sender' => $message->sender->name,
            'receiver' => $message->receiver->name
        ];
    }
}
