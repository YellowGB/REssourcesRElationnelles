<?php

namespace App\Http\Livewire;

use App\Models\Groupe;
use App\Models\Message;
use Livewire\Component;

class ChatMessage extends Component
{

    public $message;
    public $groupe;

    protected $listeners = ['messageSent' => '$refresh'];
    

    public function mount()
    {
        $this->groupe = auth()->user() ? auth()->user()->groupes->first() : null;
    }

    public function render()
    {
        if (! is_null($this->groupe))
        {
            return view('livewire.chat-message', [
                'messages'  => $this->groupe->messages,
                'groupes'   => auth()->user()->groupes,
            ]);
        }
        else
        {
            return view('livewire.chat-message', [
                'messages'  => null, 
                'groupes'   => null,
            ]);
        }
    }
    
    public function switchgroup($id)
    {
        $this->groupe = Groupe::find($id);
    }

    public function submit()    
    { 
        Message::create([
            'content'   => $this->message,
            'user_id'   => auth()->user()->id,
            'groupe_id' => $this->groupe->id,
        ]);

        $this->emitSelf('messageSent');
        $this->message = null;
    }
}
