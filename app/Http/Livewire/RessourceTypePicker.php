<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class RessourceTypePicker extends ModalComponent
{
    protected $listeners = ['RessourceTypeSelected' => 'selectRessourceType'];

    public function selectRessourceType(string $type) {

        $this->dispatchBrowserEvent('typePicked', ['type' => $type, 'title' => __('titles.create.' . $type)]);
        // $this->closeModal();
    }
    
    public function render()
    {
        return view('livewire.ressources.type-picker');
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
