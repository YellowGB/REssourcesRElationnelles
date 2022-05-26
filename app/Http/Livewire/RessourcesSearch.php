<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Statistique;
use PHPUnit\Util\Blacklist;
use Symfony\Component\Console\Input\Input;

/**
 * @since 0.8.3-alpha
 */
class RessourcesSearch extends Component
{
    public $search_terms = '';
    
    public function search()
    {
        // Blacklist de mots
        $blacklist = ['mais', 'donc', 'elle', 'nous', 'vous', 'elles', 'leur'];
    
        // On supprime les espaces en début/fin et tous les chiffres
        $this->search_terms = trim($this->search_terms);
        $this->search_terms = preg_replace('/[[:digit:]]/', '', $this->search_terms);
        $this->search_terms = strtolower($this->search_terms);
    
        // On check s'il y a des espaces dans la chaine
        if (str_contains($this->search_terms, ' ')) {
            // explode sur les espaces
            $terms_array = explode(' ', $this->search_terms);
            // On parcours la blacklist pour chaque terme
            for($i = 0; $i < count($terms_array); $i++) {
    
                if(strlen($terms_array[$i]) > 3) {
    
                    if(!in_array($terms_array[$i], $blacklist)) {
                        // On insère le terme actuel dans la base ou on incrémente le count s'il existe déjà
                        $terme = Statistique::where('search_term', '=', $terms_array[$i])->first();
                        if ($terme === null) {
                            Statistique::create([
                                'search_term' => $terms_array[$i],
                                'search_count' => '1',
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        } else {
                            $terme->search_count++;
                            $terme->update();
                        }
                    }
    
                }
                    
            }
            
        }
        else {
            // On check s'il y a plus de 3 caractères
            if (strlen($this->search_terms) > 3) {
                // On vérifie la blacklist
                if(!in_array($this->search_terms, $blacklist)) {
                    // On insère le terme actuel dans la base ou on incrémente le count s'il existe déjà
                    $terme = Statistique::where('search_term', '=', $this->search_terms)->first();
                    if ($terme === null) {
                        Statistique::create([
                            'search_term' => $this->search_terms,
                            'search_count' => '1',
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    } else {
                        $terme->search_count++;
                        $terme->update();
                    }
                }
    
            }
    
        }
        if (strlen($this->search_terms) > 3 ) {

            $user = auth()->user();
            $user->search_count++;
            $user->update();

        }
        // On envoie les termes recherchés au loader principal
        $this->emitTo('ressources-loader', 'searchRessources', $this->search_terms);
    }

    public function render()
    {
        return view('livewire.ressources.search');
    }
}
