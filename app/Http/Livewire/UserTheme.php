<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserTheme extends Component
{
    protected $listeners = ['ThemeSelected' => 'updateUserTheme'];

    public function updateUserTheme(string $theme) {
        $preference = auth()->user()->preference;
        $preference->theme = $theme;
        $preference->update();

        session(['theme' => $theme]);
    }

    public function render()
    {
        return view('livewire.user-theme');
    }
}
