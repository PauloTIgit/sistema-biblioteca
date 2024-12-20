<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BookCard extends Component
{
    public $book;

    public function __construct($book)
    {
        $this->book = $book;
    }

    public function render()
    {
        return view('components.book-card');
    }
}
