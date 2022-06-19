<?php

namespace App\View\Components;

use App\Models\Defi;
use Illuminate\View\Component;

class RessourceCreationDefi extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Defi|null $content)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.ressources.creation.defi');
    }
}
