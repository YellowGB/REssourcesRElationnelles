<?php

namespace App\Http\Livewire;

use App\Models\Ressource;
use Livewire\Component;

/**
 * @since 0.8.2-alpha
 */
class RessourcesLoader extends Component
{
    public $page;
    public $per_page;

    public function mount($page = null, $per_page = null)
    {
        $this->page     = $page ?? 1;
        $this->per_page = $per_page ?? 10;
    }

    public function render()
    {
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
