<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Cart as CartModel;

class Cart extends Component
{
    public $cartCount = 0;
    public $totalPrice = 0;

    // Listens for cart updates triggered elsewhere
    protected $listeners = ['cartUpdated'];

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $userId = auth()->id()??0;

        if ($userId || $userId == 0) {
            $this->cartCount = CartModel::where('user_id', $userId)->count();
            $this->totalPrice = CartModel::where('user_id', $userId)
                ->with('product')
                ->get()
                ->sum(function ($item) {
                    return $item->product->price * $item->qty;
                });
        } else {
            $this->cartCount = 0;
            $this->totalPrice = 0;
        }
    }

    public function cartUpdated()
    {
        $this->updateCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
