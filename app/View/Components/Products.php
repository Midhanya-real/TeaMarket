<?php

namespace App\View\Components;

use App\Http\Controllers\ProductController;
use Illuminate\Support\LazyCollection;
use Illuminate\View\Component;

class Products extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public LazyCollection $products,
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.products');
    }
}
