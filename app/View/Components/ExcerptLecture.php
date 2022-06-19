<?php

namespace App\View\Components;

use App\Models\Ressource;
use Illuminate\View\Component;

class ExcerptLecture extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Ressource $ressource)
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
        return view('components.ressources.excerpt.lecture');
    }
}
