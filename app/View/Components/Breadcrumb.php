<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Breadcrumb extends Component
{

    public $breadcrumb;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $path = request()->path();
        $this->breadcrumb = explode('/', trim($path, '/'));
        
        $this->breadcrumb = array_values(array_filter($this->breadcrumb, function($seg) {
            return !ctype_digit($seg);
        }));
        
        if(in_array(strtolower($this->breadcrumb[0]), ['orders', 'wishlist'])){
            array_unshift($this->breadcrumb, 'user');
        }
        array_unshift($this->breadcrumb, 'home');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.breadcrumb')->with('breadcrumb', $this->breadcrumb);
    }
}