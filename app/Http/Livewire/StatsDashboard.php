<?php

namespace App\Http\Livewire;

use App\Models\Progression;
use App\Models\Ressource;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class StatsDashboard extends Component
{
    public $chartSettings;
    public $total;

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

        $this->total = [
            'resources' => Ressource::all()->count(),
            'searches'  => User::all()->sum('search_count'),
            'favorites' => Progression::all()->sum('is_favorite'),
            'used'      => Progression::all()->sum('is_used'),
            'saved'     => Progression::all()->sum('is_saved'),
            'users'     => User::all()->count(),
            'connexions'=> User::where('last_connexion', '>=', Carbon::now()->subDays(1))->count(),
        ];
    }

    public function render()
    {
        return view('livewire.stats-dashboard');
    }
}
