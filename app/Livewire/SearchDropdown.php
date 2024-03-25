<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchDropdown extends Component
{
    public $search = '';
    public function render()
    {
        $resultadosBuscar = [];
        if(strlen($this->search) >= 2){
            $resultadosBuscar = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/search/movie?query='.$this->search.'&language=pt-br')
            ->json()['results'];
        }
        
        // dump($resultadosBuscar);

        return view('livewire.search-dropdown', [
            'resultadosBuscar'=>collect($resultadosBuscar)->take(7),
        ]);
    }
}
