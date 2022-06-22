<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatsDashboard extends Component
{
    public $chartSettings;

    public function mount() {
        $this->chartSettings = "
            loader: {
                color: '#2E6DAA',
                size: [30, 30],
                type: 'bar',
                textColor: '#2E2E39',
                text: 'Chargement en cours...',
            },
            error: {
                color: '#2E6DAA',
                size: [30, 30],
                text: 'Une erreur est survenue...',
                textColor: '#2E2E39',
                type: 'general',
                debug: true,
            },
        ";
    }

    public function render()
    {
        return view('livewire.stats-dashboard');
    }
}
