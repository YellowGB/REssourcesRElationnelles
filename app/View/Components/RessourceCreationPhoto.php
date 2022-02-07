<?php

namespace App\View\Components;

use App\Models\Photo;
use Illuminate\View\Component;

class RessourceCreationPhoto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Photo|null $content)
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
        return view('components.ressources.creation.photo');
    }
}
