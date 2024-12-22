<?php
namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ProductColor;

class CartComponent extends Component
{
    public $product_id;
    public $qty = 1;
    public $price;
    public $productStock;
    public $colors = [];
    public $selectedColor;
    public $capacityOptions = [];
    public $selectedCapacity;
    public $currentImage;

    public $product;
    public $relatedProducts;

    protected $listeners = ['updateCart'];

    public function mount($product, $relatedProducts)
    {
        $this->product = $product;
        $this->relatedProducts = $relatedProducts;
        $this->productStock = $product->stock;
    }

    public function addToCart()
    {
        // Logic to add the product to the cart
        if ($this->qty > $this->productStock) {
            session()->flash('error', 'Quantity exceeds stock available.');
            return;
        }

        // Example of adding to a session-based cart
        // $cart = session()->get('cart', []);

        // $cart[$this->product->id] = [
        //     'id' => $this->product->id,
        //     'title' => $this->product->title,
        //     'price' => $this->product->price,
        //     'quantity' => $this->qty,
        // ];

        $cart = Cart::where('product_id', $this->product->id)
            ->where('user_id', Auth::user()->id)
            ->firstOrNew();



        $cart->qty = $cart->exists ? $cart->qty + $this->qty : $this->qty;
        $cart->product_id = $this->product->id;
        $cart->user_id = Auth::user()->id;
        $cart->save();

        session()->put('cart', $cart);

        $this->emit('cartUpdated');
        session()->flash('success', 'Product added to cart!');
    }

    public function render()
    {
        return view('livewire.cart-component');
    }

}
