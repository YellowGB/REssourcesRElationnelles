<?php

namespace App\Http\Livewire;

use App\Enums\RessourceStatus;
use App\Models\Ressource;
use Livewire\Component;

/**
 * @since 0.8.2-alpha
 * @since 0.8.3-alpha $search_terms
 * @since 0.8.4-alpha $filter_options
 */
class RessourcesLoader extends Component
{
    public $page;
    public $per_page;
    public $search_terms;
    public $filter_options;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'searchRessources' => 'search',
        'filterRessources' => 'filter',
    ];

    public function mount($page = null, $per_page = null, $search_terms = '', $filter_options = null)
    {
        $this->page           = $page ?? 1;
        $this->per_page       = $per_page ?? 10;
        $this->search_terms   = $search_terms;
        $this->filter_options = $filter_options;
    }

    public function search($search_terms)
    {
        // On envoit les termes recherchés au loader qui prépare les ressources suivantes à récupérer
        $this->emitTo('ressources-extra-loader', 'searchRessources', $search_terms);

        // On refresh le loader principal avec la nouvelle recherche
        $this->search_terms = $search_terms;
        $this->emitSelf('refreshComponent');
    }

    public function filter($filter_options)
    {
        // On envoit les filtres au loader qui prépare les ressources suivantes à récupérer
        $this->emitTo('ressources-extra-loader', 'filterRessources', $filter_options);

        // On refresh le loader principal avec les nouveaux filtres
        $this->filter_options = $filter_options;
        $this->emitSelf('refreshComponent');
    }

    public function render()
    {
        if (! is_null($this->search_terms)) {
            $ressources = Ressource::filter($this->filter_options)
                                    ->where('title', 'like', '%'.$this->search_terms.'%')
                                    ->orWhere('status', RessourceStatus::Published->value)
                                    ->orderBy('id', 'desc')
                                    ->paginate(
                                        $this->per_page,
                                        ['*'],
                                        null,
                                        $this->page);
        }
        else {
            $ressources = Ressource::filter($this->filter_options)
                                    ->where('status', RessourceStatus::Published->value)
                                    ->orderBy('id', 'desc')
                                    ->paginate(
                                        $this->per_page,
                                        ['*'],
                                        null,
                                        $this->page);
        }

        return view('livewire.ressources.loader', [
            'ressources' => $ressources,
        ]);
    }
}
