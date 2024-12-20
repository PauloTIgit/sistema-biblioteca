<?php

namespace App\View\Components;

use Illuminate\View\Component;

class LoanCard extends Component
{
    public $loan;

    public function __construct($loan)
    {
        $this->loan = $loan;
    }

    public function render()
    {
        return view('components.loan-card');
    }
}

