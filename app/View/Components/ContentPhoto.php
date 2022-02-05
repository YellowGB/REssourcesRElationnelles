<?php

namespace App\View\Components;

use App\Models\Photo;
use Illuminate\View\Component;

/**
 * @since 0.7.0-alpha
 */
class ContentPhoto extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Photo $content)
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
        return view('components.ressources.content.photo');
    }
}
