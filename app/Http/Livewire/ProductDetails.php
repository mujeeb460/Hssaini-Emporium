<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

class ProductDetails extends Component
{
    public $product;
    public $quantity = 1;

    public function mount($product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('product_id', $this->product->id)
            ->where('user_id', Auth::id())
            ->firstOrNew();

        $cart->qty = $cart->exists ? $cart->qty + $this->quantity : $this->quantity;
        $cart->product_id = $this->product->id;
        $cart->user_id = Auth::id();
        $cart->save();

        session()->flash('success', 'Product successfully added into cart!');
        $this->emit('cartUpdated');
    }

    public function render()
    {
        return view('livewire.product-details');
    }
}
