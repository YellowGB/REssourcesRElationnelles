<?php

namespace App\Http\Livewire;

use App\Models\Ressource;
use Livewire\Component;

class RessourcesExtraLoader extends Component
{
    public $page;
    public $per_page;
    public $load_more = false;

    public function mount($page = null, $per_page = null)
    {
        $this->page     = $page ?? 1;
        $this->per_page = $per_page ?? 10;
    }

    public function loadMore()
    {
        $this->page++;
        $this->load_more = true;
    }

    public function render()
    {
        if (! $this->load_more) {
            return view('livewire.ressources.extra-loader');
        }
        else {
            $ressources = Ressource::orderBy('id', 'desc')
                                    ->paginate(
                                        $this->per_page,
                                        ['*'],
                                        null,
                                        $this->page);

            return view('livewire.ressources.loader', [
                'ressources' => $ressources,
            ]);
        }

    }
}
