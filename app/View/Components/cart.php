<?php

namespace App\View\Components;

use App\Models\Cart as CartModel;
use Illuminate\View\Component;

class cart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $cart;
    public function __construct()
    {
        $this->cart['cart'] = CartModel::where('user_id', auth()->id())->count();
        $this->cart['price'] = CartModel::where('user_id', auth()->id())
            ->with('product')
            ->get()
            ->sum(function ($item) {
                return $item->product->price * $item->qty;
            });
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cart');
    }
}
