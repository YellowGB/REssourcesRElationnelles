<?php

namespace App\Http\Livewire;


use App\Models\Groupe;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatMessage extends Component
{

    protected $listeners = ['messageSent' => '$refresh'];
    
    public $message;
    public $user_id;
    public $group_id;

    public function submit()    
    { 
        $this->user_id = auth()->user()->id;
        $this->group_id = 8;

        Message::create([
            'content' => $this->message,
            'user_id' => $this->user_id,
            'groupe_id' => $this->group_id,
        ]);
        $this->emitSelf('messageSent');
        $this->message = null;
    }

    public function render()
    {
        $groupe = Groupe::where("id", 8)->first();
        return view('livewire.chat-message', [
            'messages' => $groupe->messages,
            // 'user' => $groupe->user,
        ]);
    }
}
