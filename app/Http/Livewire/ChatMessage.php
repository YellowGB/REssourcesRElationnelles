<?php

namespace App\Http\Livewire;

use App\Models\Groupe;
use App\Models\Message;
use Livewire\Component;

class ChatMessage extends Component
{

    public $message;
    public $selected_group;

    protected $listeners = [
        'messageSent'   => '$refresh',
        'autoRefresh'   => '$refresh',
    ];

    protected $rules = ['message' => 'required|string|min:1'];
    

    public function mount()
    {
        $this->selected_group = auth()->user() ? auth()->user()->groupes->first() : null;
    }

    public function render()
    {
        if (! is_null($this->selected_group))
        {
            return view('livewire.chat', [
                'messages'  => $this->selected_group->messages,
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
        $this->selected_group = Groupe::find($id);
    }

    public function submit()    
    {
        $this->validate();

        Message::create([
            'content'   => $this->message,
            'user_id'   => auth()->user()->id,
            'groupe_id' => $this->selected_group->id,
        ]);

        $this->emitSelf('messageSent');
        $this->message = null;
    }
}
