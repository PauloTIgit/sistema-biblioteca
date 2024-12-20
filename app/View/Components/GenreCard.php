<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class GenreCard extends Component
{
    public $genre;

    public function __construct($genre)
    {
        $this->genre = $genre;
    }

    public function render()
    {
        return view('components.genre-card');
    }
}
