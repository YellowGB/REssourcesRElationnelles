<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Ressource;
use App\Enums\RessourceStatus;

/**
 * @since 0.8.2-alpha
 * @since 0.8.3-alpha $search_terms
 * @since 0.8.4-alpha $filter_options
 */
class RessourcesExtraLoader extends Component
{
    public $page;
    public $per_page;
    public $search_terms;
    public $filter_options;
    public $load_more = false;

    protected $listeners = [
        'refreshComponent' => '$refresh',
        'searchRessources' => 'search',
        'filterRessources' => 'filter',
    ];

    public function mount($page = null, $per_page = null, $search_terms = null, $filter_options = null)
    {
        $this->page           = $page ?? 1;
        $this->per_page       = $per_page ?? 10;
        $this->search_terms   = $search_terms;
        $this->filter_options = $filter_options;
    }

    public function loadMore()
    {
        $this->page++;
        $this->load_more = true;
    }

    public function search($search_terms)
    {
        // On refresh le loader avec la nouvelle recherche
        $this->search_terms = $search_terms;
        $this->emitSelf('refreshComponent');
    }

    public function filter($filter_options)
    {
        // On refresh le loader avec les nouveaux filtres
        $this->filter_options = $filter_options;
        $this->emitSelf('refreshComponent');
    }

    public function render()
    {
        if (! $this->load_more) {
            return view('livewire.ressources.extra-loader');
        }
        elseif (! is_null($this->search_terms)) {
            $ressources = Ressource::filter($this->filter_options)
                                    ->where('title', 'like', '%'.$this->search_terms.'%')
                                    ->where('status', RessourceStatus::Published->value)
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
