<?php

namespace App\View\Components;

use Illuminate\Support\LazyCollection;
use Illuminate\View\Component;

class allOrders extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public LazyCollection $orders
    ){}

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.all-orders');
    }
}
