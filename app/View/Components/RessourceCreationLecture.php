<?php

namespace App\View\Components;

use App\Models\Lecture;
use Illuminate\View\Component;

class RessourceCreationLecture extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Lecture|null $content)
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
        return view('components.ressources.creation.lecture');
    }
}
