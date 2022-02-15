<?php

namespace App\Http\Livewire;

use App\Models\Ressource;
use Livewire\Component;

/**
 * @since 0.8.2-alpha
 * @since 0.8.3-alpha $search_terms
 */
class RessourcesExtraLoader extends Component
{
    public $page;
    public $per_page;
    public $load_more = false;
    public $search_terms;

    protected $listeners = ['refreshComponent' => '$refresh', 'searchRessources' => 'search'];

    public function mount($page = null, $per_page = null, $search_terms = null)
    {
        $this->page         = $page ?? 1;
        $this->per_page     = $per_page ?? 10;
        $this->search_terms = $search_terms;
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

    public function render()
    {
        if (! $this->load_more) {
            return view('livewire.ressources.extra-loader');
        }
        elseif (! is_null($this->search_terms)) {
            $ressources = Ressource::where('title', 'like', '%'.$this->search_terms.'%')
                                    ->orderBy('id', 'desc')
                                    ->paginate(
                                        $this->per_page,
                                        ['*'],
                                        null,
                                        $this->page);
        }
        else {
            $ressources = Ressource::orderBy('id', 'desc')
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
