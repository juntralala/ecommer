<?php

namespace App\Ujun;

use Closure;
use Illuminate\View\Component;
use Illuminate\View\View;

class Sapa extends Component {
    public function render(): View|Closure|string
    {
        return view('ujun.sapa');
    }
}