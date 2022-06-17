<?php

namespace App\Http\Livewire;


use App\Models\Groupe;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatMessage extends Component
{

    public $message;
    public $user_id;

    protected $listeners = ['messageSent' => '$refresh'];
    

    public function mount()
    {
        $this->groupe = auth()->user()->groupes->first();
    }
    public function submit()    
    { 
        $this->user_id = auth()->user()->id;

        Message::create([
            'content' => $this->message,
            'user_id' => $this->user_id,
            'groupe_id' => $this->groupe->id,
        ]);

        $this->emitSelf('messageSent');
        $this->message = null;
    }
    
    public function switchgroup($id)
    {
        $this->groupe = Groupe::find($id);
    }

    public function render()
    {
        if (! is_null($this->groupe))
        {
            return view('livewire.chat-message', [
                'messages' => $this->groupe->messages, 
                'groupes' => auth()->user()->groupes,
            ]);
        }
        else
        {
            return view('livewire.chat-message', [
                'messages' => null, 
                'groupes' => null,
            ]);
        }
    }
}
