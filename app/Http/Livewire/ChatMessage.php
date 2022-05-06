<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatMessage extends Component
{
    protected $listeners = ['messageSent' => 'sendMessage'];

    public function sendMessage(string $message)
    {
        $this->dispatchBrowserEvent('messageSent', ['message' => $message, 'message' => __('titles.create.' . $message)]);
    }

    public function render()
    {
        return view('livewire.chat-message');
    }
}
