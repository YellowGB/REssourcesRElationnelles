<?php

namespace App\Http\Livewire;


use App\Models\Message;
use App\Models\Groupe;

use Livewire\Component;

class ChatMessage extends Component
{

    protected $listeners = ['messageToSend' => 'sendMessage'];

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('messageSent', ['message' => $message]);   
    }

    public function render()
    {
        $groupe = auth()->user()->groupes[0];
        return view('livewire.chat-message', [
            'messages' => $groupe->messages,
            'user' => $groupe->user,
        ]);
    }
}
