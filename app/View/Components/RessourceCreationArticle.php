<?php

namespace App\View\Components;

use App\Models\Article;
use Illuminate\View\Component;

class RessourceCreationArticle extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Article|null $content)
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
        return view('components.ressources.creation.article');
    }
}
