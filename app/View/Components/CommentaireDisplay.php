<?php

namespace App\View\Components;

use App\Models\Commentaire;
use Illuminate\View\Component;

/**
 * @since 0.7.0-alpha
 */
class CommentaireDisplay extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Commentaire $commentaire)
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
        return view('components.commentaires.display', [
            'commentateur'  => get_user_display_name($this->commentaire->user),
            'horodatage'    => format_horodatage($this->commentaire, 'simplehr'),
            'reports'       => trans_choice('titles.comment.reports', $this->commentaire->reports) . ' : '. $this->commentaire->reports,
        ]);
    }
}
