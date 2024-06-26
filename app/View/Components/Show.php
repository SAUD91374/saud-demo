<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Show extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $info;
    public $photo;
    public function __construct($info)
    {
        //
        $this->info=$info;

    //    dd($info);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.show');
    }
}
