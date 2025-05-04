<?php

namespace App\View\Components;

use App\Models\Share;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SharedPost extends Component
{
    public Share $share;

    public function __construct(Share $share)
    {
        $this->share = $share;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.shared-post');
    }
}
