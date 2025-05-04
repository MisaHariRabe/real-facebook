<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class avatar extends Component
{
    public $src;
    public $alt;
    public $size;

    /**
     * Create a new component instance.
     */
    public function __construct($src, $alt = '', $size = 'medium')
    {
        $this->src = $src;
        $this->alt = $alt;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.avatar');
    }
}
