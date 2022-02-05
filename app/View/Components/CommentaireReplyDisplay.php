<?php

namespace App\View\Components;

use App\Models\Commentaire;
use Illuminate\View\Component;

/**
 * @since 0.7.0-alpha
 */
class CommentaireReplyDisplay extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Commentaire $reply)
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
        return view('components.commentaire-reply-display');
    }
}
