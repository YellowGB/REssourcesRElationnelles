<?php

namespace App\Http\Livewire;

use Livewire\Component;

/**
 * @since 0.8.3-alpha
 */
class RessourcesSearch extends Component
{
    public $search_terms = '';

    public function search()
    {
        // On envoit les termes recherchés au loader principal
        $this->emitTo('ressources-loader', 'searchRessources', $this->search_terms);
    }

    public function render()
    {
        return view('livewire.ressources.search');
    }
}
