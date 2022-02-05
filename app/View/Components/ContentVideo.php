<?php

namespace App\View\Components;

use App\Models\Video;
use Illuminate\View\Component;

/**
 * @since 0.7.0-alpha
 */
class ContentVideo extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Video $content)
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
        return view('components.content-video');
    }
}
