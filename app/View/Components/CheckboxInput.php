<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CheckboxInput extends Component
{
    
    public $name;

    // public $value;

    public $id;


    public $status;


    public function __construct($name, $id, $status)
    {
        $this->name = $name;

        $this->id = $id;

        $this->status = $status;
        
        // $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.checkbox-input');
    }
}
